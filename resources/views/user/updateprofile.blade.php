@extends('user.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">UPDATE PROFILE</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('user.profile') }}">Profile</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Update Profile</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="card shadow-lg border-0 overflow-hidden">
            <div class="card-header bg-primary text-white">
               Update Candidate Profile
            </div>

            <form action="{{ route('user.update_profile_process', Crypt::encrypt(Auth::user()->id)) }}" method="POST"
               enctype="multipart/form-data">
               @csrf
               <div class="row g-0 align-items-center">

                  <!-- Profile Image Upload -->
                  <div class="col-md-4 text-center p-4" style="min-height: -webkit-fill-available;">
                     <img id="previewImage" src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
                        class="rounded-circle border border-3 border-primary shadow mb-3" alt="Employer Profile"
                        style="width: 150px; height: 150px; object-fit: cover;">

                     <input type="file" name="user_photo" class="form-control mt-2" accept="image/*"
                        onchange="previewFile(this);">
                  </div>

                  <!-- Form Fields -->
                  <div class="col-md-8 p-4">
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Name</label>
                           <input type="text" name="name" class="form-control" placeholder="Enter Name"
                              value="{{ $profile->username }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Email</label>
                           <input type="email" name="email" class="form-control" placeholder="Enter Email"
                              value="{{ $profile->useremail }}" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Mobile</label>
                           <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number"
                              value="{{ $profile->usermobile }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Date of Birth</label>
                           <input type="date" name="dob" class="form-control" placeholder="Enter Date of Birth"
                              value="{{ $profile->dob }}" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12 mb-3">
                           <label class="form-label">Address</label>
                           <textarea name="address" class="form-control" rows="2" id="address" placeholder="Enter Address">{{ $profile->address }}</textarea>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="form-label">City</label>
                           <input type="text" name="city" class="form-control" placeholder="Enter City"
                              value="{{ $profile->city }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">State</label>
                           <input type="text" name="state" class="form-control" placeholder="Enter State"
                              value="{{ $profile->state }}" required>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Pincode</label>
                           <input type="text" name="pincode" class="form-control" placeholder="Enter Pincode"
                              value="{{ $profile->pincode }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Gender</label>
                           <select name="gender" class="form-select" id="gender">
                              <option value="">Select Gender</option>
                              <option value="M" {{ $profile->gender == 'M' ? 'selected' : '' }}>Male
                              </option>
                              <option value="F"{{ $profile->gender == 'F' ? 'selected' : '' }}>Female
                              </option>
                              <option value="O"{{ $profile->gender == 'O' ? 'selected' : '' }}>Others
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Marital Status</label>
                           <select name="marital_status" class="form-select" id="marital_status">
                              <option value="">Select Marital Status</option>
                              <option value="single" {{ $profile->marital_status == 'single' ? 'selected' : '' }}>Single
                              </option>
                              <option value="married" {{ $profile->marital_status == 'married' ? 'selected' : '' }}>
                                 Married
                              </option>
                              <option value="widowed" {{ $profile->marital_status == 'widowed' ? 'selected' : '' }}>
                                 Widowed
                              </option>
                              <option value="divorced" {{ $profile->marital_status == 'divorced' ? 'selected' : '' }}>
                                 Divorced
                              </option>
                              <option value="separated" {{ $profile->marital_status == 'separated' ? 'selected' : '' }}>
                                 Separated
                              </option>
                           </select>
                        </div>
                        <div class="col-md-6 mb-3">
                           <label class="form-label">Category</label>
                           <select name="category" class="form-select" id="category">
                              <option value="">Select Category</option>
                              <option value="general" {{ $profile->category == 'general' ? 'selected' : '' }}>General
                              </option>
                              <option value="obc" {{ $profile->category == 'obc' ? 'selected' : '' }}>OBC
                              </option>
                              <option value="sc" {{ $profile->category == 'sc' ? 'selected' : '' }}>SC
                              </option>
                              <option value="st" {{ $profile->category == 'st' ? 'selected' : '' }}>ST
                              </option>
                              <option value="ews" {{ $profile->category == 'ews' ? 'selected' : '' }}>EWS
                              </option>
                           </select>
                        </div>

                        <div class="col-md-12 mb-3">
                           <label class="form-label">Upload Signature</label>
                           <input type="file" name="user_sign" class="form-control mt-2" accept="image/*">
                        </div>
                     </div>

                     <button type="submit" class="btn btn-primary" style="float: right;">
                        <i class="fas fa-save me-2"></i>Update Profile
                     </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!--end::App Content-->
   </main>
@endsection

<script>
   function previewFile(input) {
      const file = input.files[0];
      if (file) {
         const reader = new FileReader();
         reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
         }
         reader.readAsDataURL(file);
      }
   }

   function previewFileLogo(input) {
      const file = input.files[0];
      if (file) {
         const reader = new FileReader();
         reader.onload = function(e) {
            document.getElementById('previewImageLogo').src = e.target.result;
         }
         reader.readAsDataURL(file);
      }
   }
</script>
