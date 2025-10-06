@extends('user.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  @php
                     $mapped = [
                         '1' => '1st Year',
                         '2' => '2nd Year',
                         '3' => '3rd Year',
                         '4' => '4th Year',
                     ];

                     $statusLabel = [
                         'draft' => 'Draft',
                         'published' => 'Published',
                         'closed' => 'Closed',
                     ];

                     $statusColor = [
                         'draft' => 'bg-secondary',
                         'published' => 'bg-success',
                         'closed' => 'bg-danger',
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
                  @endphp
                  <h4 class="mb-0">{{ $form->title }} | {{ $mapped[$form->year_of_study] }} {{ $form->course_code }}
                     ({{ $form->program }}) | Session {{ $form->name }} | {{ $examLabel[$form->exam_type] }}</h4>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="card">
            <div class="card-body">

               <form action="{{ route('user.submit_exam_form',Crypt::encrypt($id)) }}" method="POST">
                  @csrf
                  <div class="row g-3">
                     <div class="col-md-4">
                        <label class="form-label">Course</label>
                        <input type="text" name="course" class="form-control" style="background: rgba(241, 231, 218, 0.984)"
                           value=" {{ $mapped[$form->year_of_study] }} {{ $form->course_code }} ({{ $form->program }})"
                           readonly>
                     </div>


                     <div class="col-md-4">
                        <label class="form-label">Session</label>
                        <input type="text" name="session" class="form-control" style="background: rgba(241, 231, 218, 0.984)" value="{{ $form->name }}"
                           placeholder="Enter session" readonly>
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Exam Type</label>
                        <input type="text" name="exam_type" style="background: rgba(241, 231, 218, 0.984)" value="{{ $form->type }}" class="form-control"
                           placeholder="Enter exam fee" readonly>
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="full_name" value="{{ Auth::user()->name }}" class="form-control"
                           placeholder="Enter full name" required>
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Father's Name</label>
                        <input type="text" name="father_name" value="{{ old('father_name') }}" class="form-control"
                           placeholder="Enter Father Name" required>
                     </div>

                     <div class="col-md-4">
                        <label class="form-label">Roll Number</label>
                        <input type="number" name="roll_no" value="{{ old('roll_no') }}" class="form-control"
                           placeholder="Enter Roll No" required>
                     </div>

                     <div class="col-md-6">
                        <label class="form-label">College</label>
                        <input type="text" name="college" value="{{ old('college') }}" class="form-control"
                           placeholder="Enter College Name" required>
                     </div>

                     <div class="col-md-6">
                        <label class="form-label">University</label>
                        <input type="text" name="university" value="{{ old('university') }}" class="form-control"
                           placeholder="Enter University Name" required>
                     </div>

                     <div class="col-md-12 mt-3">
                        <div class="border rounded p-3 bg-light">
                           <h6 class="fw-bold text-primary mb-2">Declaration</h6>
                           <p class="mb-2" style="font-size: 14px; line-height: 1.6;">
                              I hereby declare that all the information provided above is true to the best of my knowledge
                              and belief.
                              I understand that any incorrect information may lead to cancellation of my exam form or
                              disciplinary action
                              as per the institution’s rules. I also agree that once the form is submitted, the exam fee
                              will not be refunded
                              under any circumstances.
                           </p>

                           <div class="form-check mt-2">
                              <input class="form-check-input" type="checkbox" id="agree_terms" name="agree_terms" required>
                              <label class="form-check-label" for="agree_terms" style="font-size: 14px;">
                                 I have read and agree to the terms and declaration stated above.
                              </label>
                           </div>
                        </div>
                     </div>


                     <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-success">Submit Exam Form</button>
                     </div>
                  </div>
               </form>

            </div>
         </div>
      </div>

      <!--end::App Content-->
   </main>
@endsection
