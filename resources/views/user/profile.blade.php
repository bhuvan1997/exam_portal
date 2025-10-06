@extends('user.layout.app')
@section('content')
   <style>
      .timeline-wrapper {
         position: relative;
         margin-left: 20px;
         padding-left: 20px;
         border-left: 3px solid #dee2e6;
      }

      .timeline-block {
         position: relative;
         margin-bottom: 30px;
      }

      .timeline-icon {
         position: absolute;
         left: -37px;
         top: 0;
         width: 30px;
         height: 30px;
         background-color: #6c757d;
         border-radius: 50%;
         text-align: center;
         color: #fff;
         line-height: 30px;
         font-size: 14px;
         box-shadow: 0 0 0 4px #fff;
         z-index: 1;
      }

      .timeline-content {
         background: #f8f9fa;
         padding: 15px 20px;
         border-radius: 8px;
         border: 1px solid #e0e0e0;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.03);
         transition: all 0.3s ease-in-out;
      }

      .timeline-content:hover {
         transform: translateY(-2px);
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.06);
      }

      .timeline-content h5 {
         font-weight: 600;
         color: #343a40;
      }

      .skill-container {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         gap: 30px;
      }

      .progress-circle {
         width: 150px;
         height: 150px;
         border-radius: 50%;
         background: conic-gradient(#a16ce1 calc(var(--percent) * 1%), #e9ecef calc(var(--percent) * 1%));
         display: flex;
         align-items: center;
         justify-content: center;
         position: relative;
         font-family: Arial, sans-serif;
         transition: all 0.5s ease;
      }

      .progress-circle::before {
         content: '';
         position: absolute;
         width: 110px;
         height: 110px;
         background: #fff;
         border-radius: 50%;
         z-index: 1;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
         /* optional */
      }

      .progress-circle .inner-text {
         position: relative;
         z-index: 2;
         text-align: center;
      }

      .inner-text .percent {
         font-size: 20px;
         font-weight: bold;
         color: #007bff;
      }

      .inner-text .skill {
         font-size: 14px;
         font-weight: 600;
         color: #333;
         margin-top: 5px;
      }

      .language-tile {
         border: 1px solid #dee2e6;
         border-radius: 12px;
         padding: 12px 20px;
         margin: 6px;
         display: flex;
         align-items: center;
         background: #f8f9fa;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
         transition: transform 0.2s ease;
      }

      .language-tile i {
         margin-right: 10px;
         color: #007bff;
      }

      .language-tile:hover {
         transform: translateY(-3px);
         background-color: #e9f5ff;
      }
   </style>
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">PROFILE</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Profile</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="card">
            <div class="card-header position-relative bg-primary" style="padding-right: 100px;">
               <h4 class="mb-0 text-white">My Profile</h4>
               <a href="{{ route('user.update_profile', Crypt::encrypt(Auth::user()->id)) }}"
                  class="btn btn-light position-absolute" style="top: 10px; right: 20px;">Update</a>
            </div>

            <div class="card-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="card text-center p-3">
                        <div class="card-body d-flex flex-column align-items-center">

                           <!-- Profile Image -->
                           <img
                              src="{{ file_exists(public_path('uploads/users/photo/' . $profile->user_photo)) ? asset('uploads/users/photo/' . $profile->user_photo) : asset('profile/default_candidate_image.jpg') }}"
                              class="rounded-circle me-3 border" alt="Company Logo"
                              style="width: 120px; height: 120px; object-fit: cover;border: 1px solid;">

                           <!-- Candidate Name -->
                           <h4 class="mb-1">{{ $profile->name }}</h4>

                           <!-- Address -->
                           <p class="text-muted mb-3"><i class="fas fa-map-marker-alt me-1"></i>
                              {{ $profile->city . ',' . $profile->state }}</p>

                              <div>
                                <br>
                              </div>

                              <div>
                                <a href="{{ asset('uploads/users/sign/'.$profile->user_sign) }}" target="_blank" style="text-decoration: none;">Signature</a>
                              </div>

                        </div>
                     </div>

                  </div>
                  <div class="col-md-8">
                     <div class="card">
                        <div class="card-header bg-primary text-white">
                           <h4 class="mb-0">Personal Information</h4>
                        </div>
                        <div class="card-body">
                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <strong>Date of Birth:</strong>
                                 {{ !blank($profile->dob) ? date('d/m/Y', strtotime($profile->dob)) : 'NA' }}
                              </div>
                              <div class="col-md-6">
                                 <strong>Gender:</strong>
                                 {{ $profile->gender == 'M' ? 'Male' : ($profile->gender == 'F' ? 'Female' : ($profile->gender == 'O' ? 'Others' : 'NA')) }}
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <strong>Email:</strong> {{ $profile->email }}
                              </div>
                              <div class="col-md-6">
                                 <strong>Mobile:</strong> +91-{{ $profile->mobile }}
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-md-12">
                                 <strong>Address:</strong> {{ $profile->address }}
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-md-4">
                                 <strong>City:</strong> {{ $profile->city }}
                              </div>
                              <div class="col-md-4">
                                 <strong>State:</strong> {{ $profile->state }}
                              </div>
                              <div class="col-md-4">
                                 <strong>Pincode:</strong> {{ $profile->pincode }}
                              </div>
                           </div>
                           <div class="row mb-3">
                              <div class="col-md-6">
                                 <strong>Marital Status:</strong> {{ $profile->marital_status }}
                              </div>
                              <div class="col-md-6">
                                 <strong>Category:</strong> {{ $profile->category }}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection
