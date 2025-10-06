<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>Payment Receipt</title>
   <style>
      body {
         font-family: DejaVu Sans, sans-serif;
      }

      .container {
         width: 90%;
         margin: auto;
         padding: 20px;
         border: 2px solid #000;
      }

      h2 {
         text-align: center;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         margin-top: 20px;
      }

      td,
      th {
         padding: 10px;
         border: 1px solid #000;
      }

      .footer {
         margin-top: 30px;
         text-align: center;
         font-size: 14px;
      }
   </style>
</head>

<body>
   <div class="container">
      <h2>Exam Form Payment Receipt</h2>
      <p><strong>Receipt No:</strong> {{ $receipt_no }}</p>
      <p><strong>Date:</strong> {{ $date }}</p>

      <table>
         <tr>
            <th>Candidate Name</th>
            <td>{{ $name }}</td>
         </tr>
         <tr>
            <th>Exam Name</th>
            <td>{{ $exam_name }}</td>
         </tr>
         <tr>
            <th>Amount Paid</th>
            <td>₹ {{ $amount }}</td>
         </tr>
         <tr>
            <th>Order ID</th>
            <td>{{ $order_id }}</td>
         </tr>
         <tr>
            <th>Payment ID</th>
            <td>{{ $payment_id }}</td>
         </tr>
         <tr>
            <th>Payment Status</th>
            <td>{{ $paymentStatus }}</td>
         </tr>
      </table>

      <div class="footer">
         <p>Thank you for your payment!</p>
         <p><small>This is a computer-generated receipt.</small></p>
      </div>
   </div>
</body>

</html>
