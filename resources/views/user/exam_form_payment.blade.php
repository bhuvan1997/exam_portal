@extends('user.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">Payment for Submitted Form</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Exam Form Payment</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">

         <div class="card">
            <div class="card-header position-relative bg-primary" style="padding-right: 200px;">
               <h4 class="mb-0 text-white">Exam Form Payment</h4>
            </div>
            <div class="card-body">
               <!-- Filter Section -->
               <form class="row g-3 mb-4" method="GET" action="">

                  <div class="col-md-8">
                     <label for="applnnoFilter" class="form-label">Application Number</label>
                     <input type="text" class="form-control" id="applnnoFilter" name="appln_no"
                        value="{{ request('appln_no') }}" placeholder="Search with Application Number">
                  </div>

                  <div class="col-md-2 d-flex align-items-end">
                     <button type="submit" class="btn btn-primary w-100">Search</button>
                  </div>
                  <div class="col-md-2 d-flex align-items-end">
                     <a href="{{ route('user.exam_form_payment') }}" class="btn btn-secondary text-white w-100">Reset</a>
                  </div>
               </form>


               <!-- Table Section -->
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 5%">Application Number</th>
                        <th style="width: 10%">Title</th>
                        <th style="width: 10%">Course / Exam Type</th>
                        <th style="width: 5%">Session</th>
                        <th style="width: 5%">Exam Fee</th>
                        <th style="width: 5%">Application Status</th>
                        <th style="width: 5%">Payment Status</th>
                        <th style="width: 10%">Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php
                        $i = 1;
                        $mapped = [
                            '1' => '1st Year',
                            '2' => '2nd Year',
                            '3' => '3rd Year',
                            '4' => '4th Year',
                        ];

                        $statusLabel = [
                            'pending' => 'Pending',
                            'approved' => 'Approved',
                            'rejected' => 'Rejected',
                        ];

                        $statusColor = [
                            'pending' => 'bg-warning',
                            'approved' => 'bg-success',
                            'rejected' => 'bg-danger',
                        ];

                        $examLabel = [
                            '1' => 'Regular',
                            '2' => 'Supplementary',
                            '3' => 'Ex-Student',
                        ];

                        $examColor = [
                            '1' => 'bg-success',
                            '2' => 'bg-danger',
                            '3' => 'bg-dark',
                        ];

                        $paymentLabel = [
                            'P' => 'Pending',
                            'S' => 'Success',
                            'F' => 'Cancelled',
                        ];

                        $paymentColor = [
                            'P' => 'bg-warning',
                            'S' => 'bg-success',
                            'F' => 'bg-danger',
                        ];
                     @endphp
                     @forelse ($applnForm as $value)
                        <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $value->appln_no }}</td>
                           <td>{{ $value->title }}</td>
                           <td>{{ $mapped[$value->year_of_study] . ' | ' . $value->course_code . ' | ' . $value->program }}
                              <br> <span
                                 class="badge {{ $examColor[$value->exam_type] }}">{{ $examLabel[$value->exam_type] }}</span>
                           </td>
                           <td>Session | {{ $value->name }}</td>
                           <td>{{ $value->exam_fee }}</td>
                           <td><span
                                 class="badge {{ $statusColor[$value->status] }}">{{ $statusLabel[$value->status] }}</span>
                           </td>
                           <td><span
                                 class="badge {{ $paymentColor[$value->payment_status] }}">{{ $paymentLabel[$value->payment_status] }}</span>
                           </td>
                           <td>
                              <div class="btn-group btn-group-sm" role="group">
                                 @if ($value->payment_status == 'S')
                                    <a href="{{ route('user.exam_form_receipt',Crypt::encrypt($value->id)) }}" class="btn btn-warning btn-sm">Download Submitted Form Receipt</a>

                                    <a href="{{ route('user.payment_receipt',Crypt::encrypt($value->id)) }}" class="btn btn-danger btn-sm">Download
                                       Payment Receipt</a>
                                 @endif
                                 @if ($value->payment_status == 'P' && $value->status == 'pending')
                                    <a href="#" class="btn btn-dark btn-sm" id="payButton"
                                       data-appln-id="{{ $value->id }}">Pay</a>
                                 @endif
                                 <form id="rzp-success-form" action="{{ route('user.payment.callback') }}" method="POST"
                                    style="display:none;">
                                    @csrf
                                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                                    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                                 </form>

                                 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                                 <script>
                                    // Build the URL from the named route, with a placeholder we replace at runtime
                                    const createOrderTemplate = "{{ route('user.payment.createOrder', ['applnId' => '__ID__']) }}";

                                    document.addEventListener('click', function(e) {
                                       const btn = e.target.closest('#payButton');
                                       if (!btn) return;
                                       e.preventDefault();

                                       const applnId = btn.dataset.applnId;
                                       const url = createOrderTemplate.replace('__ID__', applnId); // yields /user/exam/{id}/create-order

                                       fetch(url, {
                                             headers: {
                                                'X-Requested-With': 'XMLHttpRequest'
                                             }
                                          })
                                          .then(res => {
                                             if (!res.ok) throw new Error('HTTP ' + res.status);
                                             return res.json();
                                          })
                                          .then(data => {
                                             if (data.error) {
                                                alert(data.error);
                                                return;
                                             }

                                             const options = {
                                                key: data.key,
                                                amount: data.amount,
                                                currency: data.currency,
                                                name: "Exam Payment",
                                                description: "Payment for Exam #" + data.exam_id,
                                                order_id: data.order_id,
                                                prefill: {
                                                   name: data.user.name,
                                                   email: data.user.email,
                                                   contact: data.user.mobile
                                                },
                                                handler: function(response) {
                                                   document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                                                   document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
                                                   document.getElementById('razorpay_signature').value = response.razorpay_signature;
                                                   document.getElementById('rzp-success-form').submit();
                                                }
                                             };
                                             new Razorpay(options).open();
                                          })
                                          .catch(err => {
                                             console.error(err);
                                             alert('Something went wrong (404/URL mismatch).');
                                          });
                                    });
                                 </script>
                              </div>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="10" class="text-center text-muted">No records found</td>
                        </tr>
                     @endforelse

                  </tbody>
               </table>
               <!-- Pagination Links -->
               <div class="mt-3">
                  {{ $applnForm->links('pagination::bootstrap-5') }}
               </div>
            </div>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection
