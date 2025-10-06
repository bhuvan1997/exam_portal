@extends('candidate.layout.app')
@section('content')
   <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
         <!--begin::Container-->
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-6">
                  <h4 class="mb-0">CHANGE PASSWORD</h4>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-end">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                  </ol>
               </div>
            </div>
         </div>
         <!--end::Container-->
      </div>
      <div class="app-content">
         <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
               <h4 class="mb-0">Change Password</h4>
            </div>
            <div class="card-body">

               <form action="{{ route('candidate.updatePassword') }}" method="POST">
                  @csrf

                  <div class="mb-3">
                     <label for="current_password" class="form-label">Current Password</label>
                     <input type="password" name="current_password" value="{{ old('current_password') }}" id="current_password" class="form-control" required>
                  </div>

                  <div class="mb-3">
                     <label for="new_password" class="form-label">New Password</label>
                     <input type="password" name="new_password" value="{{ old('new_password') }}" id="new_password" class="form-control" required>
                     <ul class="mt-2 small" id="password-rules">
                        <li id="rule-length" class="text-danger">At least 8 characters</li>
                        <li id="rule-upper" class="text-danger">At least 1 uppercase letter</li>
                        <li id="rule-lower" class="text-danger">At least 1 lowercase letter</li>
                        <li id="rule-number" class="text-danger">At least 1 number</li>
                        <li id="rule-special" class="text-danger">At least 1 special character</li>
                     </ul>
                  </div>

                  <div class="mb-3">
                     <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                     <input type="password" name="new_password_confirmation" id="new_password_confirmation" value="{{ old('new_password_confirmation') }}"
                        class="form-control" required>
                     <div id="confirm-feedback" class="small mt-1"></div>
                  </div>

                  <button type="submit" id="submit-btn" class="btn btn-primary w-10" style="float: right;" disabled>Update Password</button>
               </form>


            </div>
         </div>
      </div>

      <!--end::App Content-->
   </main>
   <script>
      document.addEventListener("DOMContentLoaded", function() {
         const passwordInput = document.getElementById("new_password");
         const confirmInput = document.getElementById("new_password_confirmation");
         const submitBtn = document.getElementById("submit-btn");

         const rules = {
            length: document.getElementById("rule-length"),
            upper: document.getElementById("rule-upper"),
            lower: document.getElementById("rule-lower"),
            number: document.getElementById("rule-number"),
            special: document.getElementById("rule-special"),
         };

         function validatePassword() {
            const val = passwordInput.value;
            let valid = true;

            // Check rules
            if (val.length >= 8) {
               rules.length.classList.replace("text-danger", "text-success");
            } else {
               rules.length.classList.replace("text-success", "text-danger");
               valid = false;
            }
            if (/[A-Z]/.test(val)) {
               rules.upper.classList.replace("text-danger", "text-success");
            } else {
               rules.upper.classList.replace("text-success", "text-danger");
               valid = false;
            }
            if (/[a-z]/.test(val)) {
               rules.lower.classList.replace("text-danger", "text-success");
            } else {
               rules.lower.classList.replace("text-success", "text-danger");
               valid = false;
            }
            if (/\d/.test(val)) {
               rules.number.classList.replace("text-danger", "text-success");
            } else {
               rules.number.classList.replace("text-success", "text-danger");
               valid = false;
            }
            if (/[\W_]/.test(val)) {
               rules.special.classList.replace("text-danger", "text-success");
            } else {
               rules.special.classList.replace("text-success", "text-danger");
               valid = false;
            }

            checkConfirmPassword();

            return valid;
         }

         function checkConfirmPassword() {
            const feedback = document.getElementById("confirm-feedback");
            if (confirmInput.value === "") {
               feedback.textContent = "";
               return false;
            }
            if (confirmInput.value === passwordInput.value) {
               feedback.textContent = "Passwords match ✅";
               feedback.classList.remove("text-danger");
               feedback.classList.add("text-success");
               return true;
            } else {
               feedback.textContent = "Passwords do not match ❌";
               feedback.classList.remove("text-success");
               feedback.classList.add("text-danger");
               return false;
            }
         }

         // Attach event listeners
         passwordInput.addEventListener("input", () => {
            submitBtn.disabled = !(validatePassword() && checkConfirmPassword());
         });

         confirmInput.addEventListener("input", () => {
            submitBtn.disabled = !(validatePassword() && checkConfirmPassword());
         });
      });
   </script>
@endsection
