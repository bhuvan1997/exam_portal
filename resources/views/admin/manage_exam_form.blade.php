@extends('admin.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">Manage Exam Form</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Manage Exam Form</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">

         <div class="card">
            <div class="card-header position-relative bg-primary" style="padding-right: 200px;">
               <h4 class="mb-0 text-white">Manage Exam Form</h4>
               <a href="{{ route('admin.add_exam_form') }}" class="btn btn-light position-absolute"
                  style="top: 10px; right: 20px;">
                  Add Exam Form
               </a>
            </div>
            <div class="card-body">
               <!-- Filter Section -->
               <form class="row g-3 mb-4" method="GET" action="">

                  <div class="col-md-4">
                     <label for="titleFilter" class="form-label">Title</label>
                     <input type="text" class="form-control" id="titleFilter" name="title"
                        value="{{ request('title') }}" placeholder="Search with title">
                  </div>

                  <div class="col-md-2">
                     <label for="courseFilter" class="form-label">Course</label>
                     <select name="course" class="form-select" id="courseFilter">
                        <option value="">Search by course</option>
                        @php
                                 $mapped = [
                                     '1' => '1st Year',
                                     '2' => '2nd Year',
                                     '3' => '3rd Year',
                                     '4' => '4th Year',
                                 ];
                              @endphp
                              @foreach ($course as $value)
                                 <option value="{{ $value->id }}" {{ request('course') == $value->id ? 'selected' : '' }}>
                                    {{ $mapped[$value->year_of_study] . ' | ' . $value->course_code . ' | ' . $value->program }}
                                 </option>
                              @endforeach
                     </select>
                  </div>

                  <div class="col-md-2">
                     <label for="sessionFilter" class="form-label">Session</label>
                     <select name="session_id" class="form-select" id="sessionFilter">
                        <option value="">Search by session</option>
                        @foreach ($session as $value)
                                 <option value="{{ $value->id }}" {{ request('session_id') == $value->id ? 'selected' : '' }}>
                                    Session | {{ $value->name }}
                                 </option>
                              @endforeach
                     </select>
                  </div>

                  <div class="col-md-2">
                     <label for="statusFilter" class="form-label">Status</label>
                     <select name="status" id="statusFilter" class="form-select">
                              <option value="">Select Status</option>
                              <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                              <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                              <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                           </select>
                  </div>

                  <div class="col-md-1 d-flex align-items-end">
                     <button type="submit" class="btn btn-primary w-100">Search</button>
                  </div>
                  <div class="col-md-1 d-flex align-items-end">
                     <a href="{{ route('admin.manage_exam_form') }}" class="btn btn-secondary text-white w-100">Reset</a>
                  </div>
               </form>


               <!-- Table Section -->
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Title</th>
                        <th style="width: 20%">Course / Exam Type</th>
                        <th style="width: 10%">Session</th>
                        <th style="width: 10%">Start Date</th>
                        <th style="width: 10%">End Date</th>
                        <th style="width: 5%">Fee</th>
                        <th style="width: 5%">Status</th>
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
                            'draft' => 'Draft',
                            'published' => 'Published',
                            'closed' => 'Closed'
                        ];

                        $statusColor = [
                            'draft' => 'bg-dark',
                            'published' => 'bg-success',
                            'closed' => 'bg-danger'
                        ];

                        $examLabel = [
                            '1' => 'Regular',
                            '2' => 'Supplementary',
                            '3' => 'Ex-Student'
                        ];

                        $examColor = [
                            '1' => 'bg-success',
                            '2' => 'bg-danger',
                            '3' => 'bg-dark'
                        ];
                     @endphp
                     @forelse ($examForm as $value)
                        <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $value->title }}</td>
                           <td>{{ $mapped[$value->year_of_study] . ' | ' . $value->course_code . ' | ' . $value->program }} <br> <span class="badge {{ $examColor[$value->exam_type] }}">{{ $examLabel[$value->exam_type] }}</span></td>
                           <td>Session | {{ $value->name }}</td>
                           <td>{{ $value->form_start_at }}</td>
                           <td>{{ $value->form_end_at }}</td>
                           <td>{{ $value->exam_fee }}</td>
                           <td><span class="badge {{ $statusColor[$value->status] }}">{{ $statusLabel[$value->status] }}</span></td>
                           <td>
                              <div class="btn-group btn-group-sm" role="group">
                                 <a href="#" class="btn btn-info btn-sm">Edit Exam Form</a>
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
                  {{ $examForm->links('pagination::bootstrap-5') }}
               </div>
            </div>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection
