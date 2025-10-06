@extends('admin.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="container-fluid mt-4">
            <div class="row mb-4">
               <div class="col-md-12">
                  <h2>WELCOME TO EXAM PORTAL, {{ Auth::user()->name }}</h2>
               </div>
            </div>

         </div>


         <!--end::Container-->
      </div>
      <!--end::App Content-->
   </main>
@endsection
