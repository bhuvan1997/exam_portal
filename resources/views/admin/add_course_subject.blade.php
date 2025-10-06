@extends('admin.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">Add Course Subject</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('admin.manage_course') }}">Manage Course</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Course Subject</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="card shadow-lg border-0 overflow-hidden">
            <div class="card-header bg-primary text-white">
                @php
                    $mapped = [
                            '1' => '1st Year',
                            '2' => '2nd Year',
                            '3' => '3rd Year',
                            '4' => '4th Year',
                        ];
                @endphp
               Add Course Subject for {{ $mapped[$course->year_of_study] . ' ' . $course->course_code }}
            </div>

            <form action="{{ route('admin.add_course_subject_process',Crypt::encrypt($id)) }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row g-0 align-items-center">
                  <div class="col-md-12 p-4">

                     <div class="mb-3">
                        <label class="form-label">Subjects <span class="text-danger">*</span></label>
                        <div class="row">
                           @foreach ($subject as $subj)
                              <div class="col-md-4">
                                 <div class="form-check">
                                    <input type="checkbox" class="form-check-input subject-checkbox" name="subjects[]"
                                       value="{{ $subj->id }}" id="subject{{ $subj->id }}">
                                    <label class="form-check-label" for="subject{{ $subj->id }}">
                                       {{ $subj->name }}
                                    </label>
                                 </div>
                              </div>
                           @endforeach
                        </div>
                     </div>

                     <!-- Submit Button -->
                     <div class="text-end">
                        <button type="submit" id="addJobBtn" class="btn btn-primary">
                           Add Course Subject
                        </button>
                     </div>

                  </div>
               </div>
            </form>
         </div>
      </div>
      <!--end::App Content-->
   </main>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         const maxSelection = 6;
         const checkboxes = document.querySelectorAll(".subject-checkbox");

         checkboxes.forEach(cb => {
            cb.addEventListener("change", function() {
               const checkedCount = document.querySelectorAll(".subject-checkbox:checked").length;
               if (checkedCount > maxSelection) {
                  this.checked = false;
                  alert("You can select maximum " + maxSelection + " subjects.");
               }
            });
         });
      });
   </script>
@endsection
