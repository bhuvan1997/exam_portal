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

               <!-- Table Section -->
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 15%">Application Number</th>
                        <th style="width: 20%">Exam</th>
                        <th style="width: 10%">Session</th>
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
                     @endphp
                     @forelse ($query as $value)
                        <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $value->appln_no }}</td>
                           <td>{{ $value->title }} <br> <span
                                 class="badge {{ $examColor[$value->exam_type] }}">{{ $examLabel[$value->exam_type] }}</span>
                           </td>
                           <td>Session | {{ $value->name }}</td>
                           <td><span
                                 class="badge {{ $statusColor[$value->status] }}">{{ $statusLabel[$value->status] }}</span>
                           </td>
                           <td>
                              <div class="btn-group btn-group-sm" role="group">
                                 <a href="{{ route('admin.exam_form_receipt', Crypt::encrypt($value->id)) }}"
                                    class="btn btn-warning btn-sm" target="_blank">View Student Form</a>
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Check and Update
                                 </button>
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
               {{-- <div class="mt-3">
                  {{ $query->links('pagination::bootstrap-5') }}
               </div> --}}
            </div>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection
