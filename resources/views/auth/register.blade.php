<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>EXAM PORTAL | Register</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <!-- Fonts & Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
   <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}" />

   <!-- Include toastr CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

   <style>
      body {
         background: linear-gradient(to right, #003366, #9fbede);
         background-size: cover;
         font-family: 'Source Sans 3', sans-serif;
      }

      .login-box {
         max-width: 500px;
         margin: 80px auto;
         margin-top: 2%;
      }

      .card {
         border-radius: 10px;
         box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      }

      .login-logo {
         background-color: #003366;
         color: white;
         text-align: center;
         padding: 20px 0;
         font-size: 26px;
         font-weight: bold;
         border-top-left-radius: 10px;
         border-top-right-radius: 10px;
         margin-bottom: 0;
      }

      .login-logo a {
         color: #ffffff;
         text-shadow: 0 1px 3px rgba(0, 0, 0, 0.6);
      }

      .login-card-body {
         padding: 30px;
      }

      .form-control {
         border-radius: 10px;
      }

      .input-group-text {
         background-color: #f1f1f1;
         border-radius: 10px;
      }

      .btn-primary {
         border-radius: 10px;
         background-color: #003366;
         border: none;
         font-weight: bold;
      }

      .btn-primary:hover {
         background-color: #00509e;
      }

      .login-box-msg {
         font-size: 18px;
         margin-bottom: 20px;
         color: #333;
         text-align: center;
      }

      .footer-links {
         text-align: center;
         margin-top: 20px;
         font-size: 15px;
      }

      .footer-links a {
         color: #00509e;
         text-decoration: none;
      }

      .footer-links a:hover {
         text-decoration: underline;
      }
   </style>
   <style>
      /* Green & red border with smooth effect */
      .form-control.is-valid {
         border-color: #28a745;
         box-shadow: 0 0 6px rgba(40, 167, 69, 0.4);
      }

      .form-control.is-invalid {
         border-color: #dc3545;
         box-shadow: 0 0 6px rgba(220, 53, 69, 0.4);
      }

      /* Feedback text */
      .invalid-feedback {
         font-size: 0.85rem;
         margin-top: 3px;
         color: #dc3545;
      }

      /* Icons inside input group */
      .validation-icon {
         width: 40px;
         display: flex;
         justify-content: center;
         align-items: center;
         font-size: 18px;
      }

      .validation-icon.valid {
         color: #28a745;
      }

      /* green */
      .validation-icon.invalid {
         color: #dc3545;
      }

      /* red */
   </style>

</head>

<body class="login-page bg-transparent">

   <div class="login-box">
      <div class="login-logo">
         <a href="#" style="color: white; text-decoration: none;">EXAM PORTAL</a>
      </div>

      <div class="card">
         <div class="card-body login-card-body">
            <p class="login-box-msg">Create a new account to fill the exam form</p>

            <form action="{{ route('register') }}" method="post" id="registerForm" novalidate>
               @csrf

               <!-- Full Name -->
               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="text" class="form-control" name="name" placeholder="Enter full name" required />
                     <span class="input-group-text validation-icon"><i class="bi bi-person-fill"></i></span>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               <!-- Email -->
               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="email" class="form-control" name="email" placeholder="Enter email" required />
                     <span class="input-group-text validation-icon"><i class="bi bi-envelope-fill"></i></span>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               <!-- Mobile -->
               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="text" class="form-control" maxlength="10" name="mobile"
                        placeholder="Enter mobile number" required />
                     <span class="input-group-text validation-icon"><i class="bi bi-phone-fill"></i></span>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               <!-- Password -->
               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="password" class="form-control" name="password" placeholder="Enter password"
                        required />
                     <span class="input-group-text validation-icon"><i class="bi bi-lock-fill"></i></span>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               <!-- Confirm Password -->
               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="password" class="form-control" name="password_confirmation"
                        placeholder="Confirm password" required />
                     <span class="input-group-text validation-icon"><i class="bi bi-lock-fill"></i></span>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               <!-- Captcha -->
               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="text" name="captcha" class="form-control" placeholder="Enter the code" required />
                     <div class="input-group-text p-0">
                        <img id="captchaImage" src="{{ url('captcha-image') }}?t={{ time() }}"
                           onclick="this.src='{{ url('captcha-image') }}?t=' + Math.random();" style="cursor:pointer;"
                           alt="captcha" />
                     </div>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>



            <div class="footer-links">
               <a href="{{ route('login') }}">Already have an account? Sign In</a>
            </div>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
   <script src="{{ url('js/adminlte.js') }}"></script>

   <!-- Include toastr JS -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <script>
      @if (session('success_message'))
         toastr.success("{{ session('success_message') }}");
      @endif

      @if (session('error_message'))
         toastr.error("{{ session('error_message') }}");
      @endif

      @if ($errors->any())
         @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
         @endforeach
      @endif
   </script>

   <script>
      function setError(input, message) {
         input.classList.add("is-invalid");
         input.classList.remove("is-valid");

         let feedback = input.closest(".input-group").querySelector(".invalid-feedback");
         feedback.innerText = message;

         let icon = input.closest(".input-group").querySelector(".validation-icon");
         icon.className = "input-group-text validation-icon invalid";
      }

      function setSuccess(input) {
         input.classList.remove("is-invalid");
         input.classList.add("is-valid");

         let feedback = input.closest(".input-group").querySelector(".invalid-feedback");
         feedback.innerText = "";

         let icon = input.closest(".input-group").querySelector(".validation-icon");
         icon.className = "input-group-text validation-icon valid";
      }

      // Validation functions
      function validateName(input) {
         if (!/^[a-zA-Z\s]+$/.test(input.value.trim())) {
            setError(input, "Only letters and spaces allowed in Full Name");
            return false;
         }
         setSuccess(input);
         return true;
      }

      function validateEmail(input) {
         let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
         if (!regex.test(input.value.trim())) {
            setError(input, "Enter a valid email address.");
            return false;
         }
         setSuccess(input);
         return true;
      }

      function validateMobile(input) {
         if (!/^[6-9]\d{9}$/.test(input.value.trim())) {
            setError(input, "Enter a valid 10-digit mobile (starts with 6-9).");
            return false;
         }
         setSuccess(input);
         return true;
      }

      function validatePassword(input) {
         let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
         if (!regex.test(input.value)) {
            setError(input, "Min 8 chars, with upper, lower, number & special char in Password");
            return false;
         }
         setSuccess(input);
         return true;
      }

      function validateConfirmPassword(input, passwordInput) {
         if (input.value !== passwordInput.value || input.value === "") {
            setError(input, "Passwords do not match.");
            return false;
         }
         setSuccess(input);
         return true;
      }

      function validateCaptcha(input) {
         if (input.value.trim() === "") {
            setError(input, "Captcha is required.");
            return false;
         }
         setSuccess(input);
         return true;
      }

      document.addEventListener("DOMContentLoaded", function() {
         let form = document.getElementById("registerForm");
         let nameInput = form.querySelector("input[name='name']");
         let emailInput = form.querySelector("input[name='email']");
         let mobileInput = form.querySelector("input[name='mobile']");
         let passwordInput = form.querySelector("input[name='password']");
         let confirmPasswordInput = form.querySelector("input[name='password_confirmation']");
         let captchaInput = form.querySelector("input[name='captcha']");

         // Live validation
         nameInput.addEventListener("input", () => validateName(nameInput));
         emailInput.addEventListener("input", () => validateEmail(emailInput));
         mobileInput.addEventListener("input", () => validateMobile(mobileInput));
         passwordInput.addEventListener("input", () => validatePassword(passwordInput));
         confirmPasswordInput.addEventListener("input", () => validateConfirmPassword(confirmPasswordInput,
            passwordInput));
         captchaInput.addEventListener("input", () => validateCaptcha(captchaInput));

         // Final check on submit
         form.addEventListener("submit", function(e) {
            let isValid =
               validateName(nameInput) &
               validateEmail(emailInput) &
               validateMobile(mobileInput) &
               validatePassword(passwordInput) &
               validateConfirmPassword(confirmPasswordInput, passwordInput) &
               validateCaptcha(captchaInput);

            if (!isValid) e.preventDefault();
         });
      });
   </script>




</body>

</html>
