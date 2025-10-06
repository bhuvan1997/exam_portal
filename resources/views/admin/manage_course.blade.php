@extends('admin.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">Manage Course</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Manage Course</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">

         <div class="card">
            <div class="card-header position-relative bg-primary" style="padding-right: 200px;">
               <h4 class="mb-0 text-white">Manage Course</h4>
               <a href="{{ route('admin.add_course') }}" class="btn btn-light position-absolute"
                  style="top: 10px; right: 20px;">
                  Add Course
               </a>
            </div>
            <div class="card-body">
               <!-- Filter Section -->
               <form class="row g-3 mb-4" method="GET" action="">

                  <div class="col-md-4">
                     <label for="courseFilter" class="form-label">Course Code</label>
                     <input type="text" class="form-control" id="courseFilter" name="course_code"
                        value="{{ request('course_code') }}" placeholder="Search with Course Code">
                  </div>

                  <div class="col-md-4">
                     <label for="yearFilter" class="form-label">Year of Study</label>
                     <select name="year_of_study" id="yearFilter" class="form-select">
                        <option value="">Select Year</option>
                        <option value="1" {{ request('year_of_study') == 1 ? '1' : '' }}>1st Year</option>
                        <option value="2" {{ request('year_of_study') == 2 ? '2' : '' }}>2nd Year</option>
                        <option value="3" {{ request('year_of_study') == 3 ? '3' : '' }}>3rd Year</option>
                        <option value="4" {{ request('year_of_study') == 4 ? '4' : '' }}>4th Year</option>
                     </select>
                  </div>

                  <div class="col-md-2 d-flex align-items-end">
                     <button type="submit" class="btn btn-primary w-100">Search</button>
                  </div>
                  <div class="col-md-2 d-flex align-items-end">
                     <a href="{{ route('admin.manage_course') }}" class="btn btn-secondary text-white w-100">Reset</a>
                  </div>
               </form>


               <!-- Table Section -->
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Year of Study</th>
                        <th style="width: 15%">Course Code</th>
                        <th style="width: 35%">Course</th>
                        <th style="width: 30%">Action</th>
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
                     @endphp
                     @forelse ($course as $value)
                        <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $mapped[$value->year_of_study] }}</td>
                           <td>{{ $value->course_code }}</td>
                           <td>{{ $value->program }}</td>
                           <td>
                              <div class="btn-group btn-group-sm" role="group">
                                 <a href="#" class="btn btn-info btn-sm">Edit Course</a>
                                 <a href="{{ route('admin.add_course_subject',Crypt::encrypt($value->id)) }}" class="btn btn-primary btn-sm">Add Course Subject</a>
                                 <a href="" class="btn btn-warning btn-sm">View Course Subject</a>
                              </div>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="text-center text-muted">No records found</td>
                        </tr>
                     @endforelse
                  </tbody>
               </table>
               <!-- Pagination Links -->
               <div class="mt-3">
                  {{ $course->links('pagination::bootstrap-5') }}
               </div>
            </div>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection
