<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // ✅ 1. Create Razorpay order (called via AJAX when user clicks "Pay")
    public function createOrder(Request $request, $applnId)
    {
        $exam = DB::table('tbl_appln_form as af')->leftJoin('tbl_exam as e', 'e.id', '=', 'af.exam_id')->where('af.id', $applnId)->first();
        if (!$exam) {
            return response()->json(['error' => 'Exam not found.'], 404);
        }

        $api = new Api(
            config('services.razorpay.key_id'),
            config('services.razorpay.key_secret')
        );
        // $amountInPaise = ((int) $exam->exam_fee) * 100;
        $amount = ((int) $exam->exam_fee) * 100;

        $order = $api->order->create([
            'receipt' => 'recpt_' . time() . '_' . $applnId . '_' . Auth::id(),
            'amount' => $amount,
            'currency' => 'INR',
            'payment_capture' => 1,
            'notes' => [
                'exam_id' => $applnId,
                'user_id' => Auth::id(),
            ],
        ]);

        // Insert into tbl_payments
        DB::table('tbl_payments')->insert([
            'user_id' => Auth::id(),
            'appln_id' => $applnId,
            'order_id' => $order['id'],
            'amount' => $amount,
            'currency' => 'INR',
            'status' => 'created',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Update exam_table
        DB::table('tbl_appln_form')->where('id', $applnId)->update([
            'payment_order_id' => $order['id'],
            'payment_status' => 'P',
        ]);

        return response()->json([
            'order_id' => $order['id'],
            'amount' => $order['amount'],
            'currency' => $order['currency'],
            'key' => env('RAZORPAY_KEY_ID'),
            'exam_id' => $applnId,
            'exam_fee' => $exam->exam_fee,
            'user' => [
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'mobile' => Auth::user()->mobile ?? '',
            ],
        ]);
    }

    // ✅ 2. Callback after successful payment
    public function callback(Request $request)
    {
        $orderId = $request->input('razorpay_order_id');
        $paymentId = $request->input('razorpay_payment_id');
        $signature = $request->input('razorpay_signature');

        $paymentRow = DB::table('tbl_payments')->where('order_id', $orderId)->first();
        if (!$paymentRow) {
            return redirect()->back()->with('error_message', 'Payment record not found.');
        }

        $generatedSignature = hash_hmac('sha256', $orderId . '|' . $paymentId, env('RAZORPAY_KEY_SECRET'));

        if (hash_equals($generatedSignature, $signature)) {
            DB::table('tbl_payments')->where('order_id', $orderId)->update([
                'payment_id' => $paymentId,
                'signature' => $signature,
                'status' => 'paid',
                'updated_at' => now(),
            ]);

            DB::table('tbl_appln_form')->where('id', $paymentRow->appln_id)->update([
                'payment_status' => 'S',
                'payment_id' => $paymentId,
                'paid_at' => now(),
            ]);

            return redirect()->back()->with('success_message', 'Payment successful!');
        } else {
            DB::table('tbl_payments')->where('order_id', $orderId)->update([
                'status' => 'failed',
                'updated_at' => now(),
            ]);

            DB::table('tbl_appln_form')->where('id', $paymentRow->appln_id)->update([
                'payment_status' => 'F',
            ]);

            return redirect()->back()->with('error_message', 'Payment verification failed.');
        }
    }
}
