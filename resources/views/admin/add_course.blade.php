@extends('admin.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">Add Course</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('admin.manage_course') }}">Manage Course</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Add Course</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="card shadow-lg border-0 overflow-hidden">
            <div class="card-header bg-primary text-white">
               Add Course
            </div>

            <form action="{{ route('admin.add_cource_process') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row g-0 align-items-center">
                  <div class="col-md-12 p-4">

                     <div class="row">
                        <!-- Job Title -->
                        <div class="mb-3 col-md-6">
                           <label class="form-label">Year of Study<span class="text-danger">*</span></label>
                           <select name="year_of_study" id="year_of_study" class="form-select" required>
                              <option value="">Select Year</option>
                              <option value="1" {{ old('year_of_study') == '1' ? 'selected' : '' }}>1st Year</option>
                              <option value="2" {{ old('year_of_study') == '2' ? 'selected' : '' }}>2nd Year</option>
                              <option value="3" {{ old('year_of_study') == '3' ? 'selected' : '' }}>3rd Year</option>
                              <option value="4" {{ old('year_of_study') == '4' ? 'selected' : '' }}>4th Year</option>
                           </select>
                        </div>

                        <div class="mb-3 col-md-6">
                           <label class="form-label">Course Code<span class="text-danger">*</span></label>
                           <input type="text" name="course_code" value="{{ old('course_code') }}" class="form-control"
                              placeholder="Enter Course Code" required>
                        </div>
                     </div>

                     <div class="mb-3">
                        <label class="form-label">Course<span class="text-danger">*</span></label>
                        <input type="text" name="course" value="{{ old('course') }}" class="form-control"
                           placeholder="Enter Course" required>
                     </div>

                     <!-- Submit Button -->
                     <div class="text-end">
                        <button type="submit" id="addJobBtn" class="btn btn-primary">
                           Add Course
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
