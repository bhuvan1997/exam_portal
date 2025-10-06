@extends('admin.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">Add Exam Form</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('admin.manage_exam_form') }}">Manage Exam Form</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Exam Form</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="card shadow-lg border-0 overflow-hidden">
            <div class="card-header bg-primary text-white">
               Add Exam Form
            </div>

            <form action="{{ route('admin.add_exam_form_process') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row g-0 align-items-center">
                  <div class="col-md-12 p-4">

                     <div class="row">
                        <div class="mb-3 col-md-4">
                           <label class="form-label">Title<span class="text-danger">*</span></label>
                           <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                              placeholder="Enter title for the exam" required>
                        </div>

                        <div class="mb-3 col-md-4">
                           <label class="form-label">Course<span class="text-danger">*</span></label>
                           <select name="course" id="course" class="form-select" required>
                              <option value="">Select Course</option>
                              @php
                                 $mapped = [
                                     '1' => '1st Year',
                                     '2' => '2nd Year',
                                     '3' => '3rd Year',
                                     '4' => '4th Year',
                                 ];
                              @endphp
                              @foreach ($course as $value)
                                 <option value="{{ $value->id }}" {{ old('course') == $value->id ? 'selected' : '' }}>
                                    {{ $mapped[$value->year_of_study] . ' | ' . $value->course_code . ' | ' . $value->program }}
                                 </option>
                              @endforeach
                           </select>
                        </div>

                        <div class="mb-3 col-md-2">
                           <label class="form-label">Session<span class="text-danger">*</span></label>
                           <select name="session" id="session" class="form-select" required>
                              <option value="">Select Session</option>
                              @foreach ($session as $value)
                                 <option value="{{ $value->id }}" {{ old('session') == $value->id ? 'selected' : '' }}>
                                    Session | {{ $value->name }}
                                 </option>
                              @endforeach
                           </select>
                        </div>
                        <div class="mb-3 col-md-2">
                           <label class="form-label">Exam Type<span class="text-danger">*</span></label>
                           <select name="exam_type" id="exam_type" class="form-select" required>
                              <option value="">Select Exam Type</option>
                              @foreach ($exam_type as $value)
                                 <option value="{{ $value->id }}" {{ old('exam_type') == $value->id ? 'selected' : '' }}>
                                    {{ $value->type }}
                                 </option>
                              @endforeach
                           </select>
                        </div>
                     </div>

                     <div class="row">
                        <div class="mb-3 col-md-3">
                           <label class="form-label">Form Start Date<span class="text-danger">*</span></label>
                           <input type="datetime-local" name="form_start_date" value="{{ old('form_start_date') }}" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                           <label class="form-label">Form End Date<span class="text-danger">*</span></label>
                           <input type="datetime-local" name="form_end_date" value="{{ old('form_end_date') }}" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                           <label class="form-label">Fee<span class="text-danger">*</span></label>
                           <input type="number" name="exam_fee" value="{{ old('exam_fee') }}" class="form-control" required>
                        </div>

                        <div class="mb-3 col-md-3">
                           <label class="form-label">Status<span class="text-danger">*</span></label>
                           <select name="status" id="status" class="form-select" required>
                              <option value="">Select Status</option>
                              <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                              <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                              <option value="closed" {{ old('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                           </select>
                        </div>
                     </div>

                     <!-- Submit Button -->
                     <div class="text-end">
                        <button type="submit" id="" class="btn btn-primary">
                           Add Form
                        </button>
                     </div>

                  </div>
               </div>
            </form>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection
