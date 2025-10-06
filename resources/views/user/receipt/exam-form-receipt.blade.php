<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <title>Exam Form Payment Receipt</title>
   <style>
      @page {
         margin: 25px 25px 35px 25px;
      }

      body {
         font-family: DejaVu Sans, sans-serif;
         font-size: 12px;
         color: #111;
      }

      .border {
         border: 1px solid #000;
      }

      .wrap {
         padding: 14px;
      }

      .center {
         text-align: center;
      }

      .right {
         text-align: right;
      }

      .bold {
         font-weight: bold;
      }

      .muted {
         color: #444;
      }

      .row {
         width: 100%;
      }

      .col-8 {
         width: 66%;
         display: inline-block;
         vertical-align: top;
      }

      .col-4 {
         width: 33%;
         display: inline-block;
         vertical-align: top;
      }

      .mt-10 {
         margin-top: 10px;
      }

      .mt-15 {
         margin-top: 15px;
      }

      .mb-5 {
         margin-bottom: 5px;
      }

      .table {
         width: 100%;
         border-collapse: collapse;
      }

      .table th,
      .table td {
         border: 1px solid #000;
         padding: 6px;
      }

      .table th {
         background: #efefef;
      }

      .header-title {
         font-size: 18px;
      }

      .subtitle {
         font-size: 12px;
      }

      .kv td {
         padding: 6px 8px;
         border: 1px solid #000;
      }

      .photo,
      .sign {
         border: 1px solid #000;
         width: 120px;
         height: 150px;
         object-fit: cover;
      }

      .sign {
         height: 60px;
      }

      .stamp {
         font-size: 11px;
         text-align: center;
         margin-top: 3px;
      }

      .paid-badge {
         position: fixed;
         right: 25px;
         top: 25px;
         border: 2px solid #28a745;
         padding: 3px 8px;
         border-radius: 4px;
         font-size: 12px;
      }

      .footer {
         position: fixed;
         bottom: 15px;
         left: 25px;
         right: 25px;
         font-size: 10px;
         color: #666;
      }
   </style>
</head>

<body>
   <div class="border wrap">
      <!-- Header -->
      <div class="row">
         <div class="col-8">
            <div class="header-title bold">EXAM PORTAL</div>
         </div>
         <div class="col-4 right">
            <div class="bold">Application No: {{ $exam['appln_no'] }}</div>
            <div>Date: {{ $exam['paid_on'] }}</div>
         </div>
      </div>

      <!-- Student + Photo/Sign -->
      <div class="row mt-15">
         <div class="col-8">
            <table class="kv" width="100%" cellspacing="0" cellpadding="0">
               <tr>
                  <td class="bold" width="30%">Student Name</td>
                  <td width="70%">{{ $student['name'] }}</td>
               </tr>
               <tr>
                  <td class="bold">Father's Name</td>
                  <td>{{ $student['father_name'] }}</td>
               </tr>
               <tr>
                  <td class="bold">Roll No</td>
                  <td>{{ $student['roll_no'] }}</td>
               </tr>
               <tr>
                  <td class="bold">DOB</td>
                  <td>{{ $student['dob'] }}</td>
               </tr>
               <tr>
                  <td class="bold">Category</td>
                  <td>{{ $student['category'] }}</td>
               </tr>
               <tr>
                  <td class="bold">College</td>
                  <td>{{ $student['college'] }}</td>
               </tr>
               <tr>
                  <td class="bold">University</td>
                  <td>{{ $student['university'] }}</td>
               </tr>
               <tr>
                  <td class="bold">Mobile / Email</td>
                  <td>{{ $student['mobile'] }} / {{ $student['email'] }}</td>
               </tr>
            </table>
         </div>
         <div class="col-4 center">
            <div>
               @if ($photoBase64)
                  <img class="photo" src="{{ $photoBase64 }}" alt="Student Photo">
               @else
                  <div class="photo" style="line-height:150px;">No Photo</div>
               @endif
               <div class="stamp muted">Student Photo</div>
            </div>
            <div class="mt-10">
               @if ($signBase64)
                  <img class="sign" src="{{ $signBase64 }}" alt="Signature">
               @else
                  <div class="sign" style="line-height:60px;">No Signature</div>
               @endif
               <div class="stamp muted">Student Signature</div>
            </div>
         </div>
      </div>

      <!-- Exam Details -->
      <div class="mt-15">
         <table class="kv" width="100%" cellspacing="0" cellpadding="0">
            <tr>
               <td class="bold" width="20%">Exam</td>
               <td width="30%">{{ $exam['title'] }}</td>
               <td class="bold" width="20%">Session</td>
               <td width="30%">{{ $exam['session'] }}</td>
            </tr>
            <tr>
               <td class="bold">Exam Type</td>
               <td>{{ $exam['exam_type'] }}</td>
               <td class="bold">Form Window</td>
               <td>{{ $exam['form_start'] }} to {{ $exam['form_end'] }}</td>
            </tr>
            <tr>
                <td class="bold">Order ID</td>
               <td>{{ $exam['order_id'] }}</td>
               <td class="bold">Payment Status</td>
               <td>{{ $exam['status'] }}</td>
            </tr>
            <tr>
               <td class="bold">Payment ID</td>
               <td>{{ $exam['payment_id'] }}</td>
               <td class="bold">Paid On</td>
               <td>{{ $exam['paid_on'] }}</td>
            </tr>
         </table>
      </div>

      <!-- Subjects -->
      <div class="mt-15">
         <div class="bold mb-5">Subjects</div>
         <table class="table">
            <thead>
               <tr>
                  <th style="width: 8%;">#</th>
                  <th style="width: 22%;">Code</th>
                  <th>Subject Name</th>
               </tr>
            </thead>
            <tbody>
                @php
                    $mapped = [
                         '1' => '1st Year',
                         '2' => '2nd Year',
                         '3' => '3rd Year',
                         '4' => '4th Year',
                     ];
                @endphp
               @foreach ($subjects as $i => $sub)
                  <tr>
                     <td class="center">{{ $i + 1 }}</td>
                     <td>{{ $mapped[$sub->year_of_study] . ' | ' . $sub->course_code }}</td>
                     <td>{{ $sub->name }}</td>
                  </tr>
               @endforeach
            </tbody>
         </table>
      </div>

      <!-- Payment Summary -->
      <div class="mt-15">
         <table class="kv" width="100%" cellspacing="0" cellpadding="0">
            <tr>
               <td class="bold" width="20%">Exam Fee</td>
               <td width="30%">₹ {{ number_format($exam['exam_fee'], 2) }}</td>
               <td class="bold">Total Paid</td>
               <td colspan="3" class="bold">₹ {{ number_format($amount_total, 2) }}</td>
            </tr>
         </table>
      </div>
   </div>

   <div class="footer center mt-3">
      This is a computer-generated receipt. No signature required. © {{ date('Y') }} EXAM PORTAL.
   </div>
</body>

</html>
