@extends('user.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">Fill out the given form as per your course</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Fill Form</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">

         <div class="card">
            <div class="card-header bg-light text-dark rounded-top">
               <div class="alert alert-warning py-1 px-2 mb-0 mt-2 fw-semibold" style="font-size: 0.9rem;">
                  ⚠️ Please fill the form carefully. Fees will not be refunded for wrong entries.
               </div>
            </div>

            <div class="card-body">

               <!-- Exam Forms Card View -->
               <div class="row g-3">
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

                  @forelse ($forms as $value)
                     <div class="col-md-4">
                        <div class="card shadow-sm border-0 h-100">
                           <div class="card-body">
                              <div class="d-flex justify-content-between align-items-center mb-2">
                                 <h5 class="card-title mb-0 text-primary fw-bold">{{ $value->title }}</h5>
                                 <span class="badge {{ $statusColor[$value->status] }}">
                                    {{ $statusLabel[$value->status] }}
                                 </span>
                              </div>
                              <hr class="mt-1 mb-2">

                              <p class="mb-1"><strong>Course:</strong> {{ $mapped[$value->year_of_study] }} |
                                 {{ $value->course_code }} | {{ $value->program }}</p>
                              <p class="mb-1"><strong>Session:</strong> {{ $value->name }}</p>
                              <p class="mb-1"><strong>Exam Type:</strong> <span
                                    class="badge {{ $examColor[$value->exam_type] }}">{{ $examLabel[$value->exam_type] }}</span>
                              </p>
                              <p class="mb-1"><strong>Start Date:</strong>
                                 {{ \Carbon\Carbon::parse($value->form_start_at)->format('d M Y') }}</p>
                              <p class="mb-1"><strong>End Date:</strong>
                                 {{ \Carbon\Carbon::parse($value->form_end_at)->format('d M Y') }}</p>
                              <p class="mb-1"><strong>Exam Fee:</strong> ₹{{ number_format($value->exam_fee, 2) }}</p>

                              @php

                                 $now = \Carbon\Carbon::now(); // current date & time
                                 $start = \Carbon\Carbon::parse($value->form_start_at);
                                 $end = \Carbon\Carbon::parse($value->form_end_at);
                                 $isActive = $now->between($start, $end);
                              @endphp

                              <div class="mt-3 d-flex justify-content-between">
                                 @if ($isActive)
                                    @php
                                       $checkExist = DB::table('tbl_appln_form')
                                           ->where('exam_id', $value->id)
                                           ->where('user_id', Auth::user()->id)
                                           ->whereIn('status', ['pending', 'approved'])
                                           ->exists();
                                    @endphp
                                    <a href="{{ route('user.fill_exam_form', Crypt::encrypt($value->id)) }}"
                                       class="btn btn-warning btn-sm w-100 {{ $checkExist ? 'disabled' : '' }}"
                                       {{ $checkExist ? 'aria-disabled=true' : '' }}
                                       {{ $checkExist ? 'tabindex=-1' : '' }}>
                                       {{ $checkExist ? 'Form Already Submitted' : 'Choose Exam Form to Fill' }}
                                    </a>
                                 @else
                                    <button class="btn btn-secondary btn-sm w-100" disabled>
                                       @if ($now->lt($start))
                                          Form will open on
                                          <strong>{{ $start->format('d M Y, h:i A') }}</strong>
                                       @elseif($now->gt($end))
                                          Form filling period ended on
                                          <strong>{{ $end->format('d M Y, h:i A') }}</strong>
                                       @endif
                                    </button>
                                 @endif
                              </div>

                           </div>
                        </div>
                     </div>
                  @empty
                     <div class="col-12 text-center py-5">
                        <p class="text-muted">No exam forms available</p>
                     </div>
                  @endforelse
               </div>

               <!-- Pagination -->
               <div class="mt-4 d-flex justify-content-center">
                  {{ $forms->links('pagination::bootstrap-5') }}
               </div>

            </div>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection
