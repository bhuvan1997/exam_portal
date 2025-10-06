<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <title>EXAM PORTAL | Login</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <!-- Fonts & Icons -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
   <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}" />

   <!-- Include toastr CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

   <!-- Custom Styles -->
   <style>
      body {
         background: linear-gradient(to right, #003366, #9fbede);
         background-size: cover;
         font-family: 'Source Sans 3', sans-serif;
      }

      .login-box {
         max-width: 500px;
         margin: 80px auto;
         margin-top: 0;
      }

      .card {
         border-radius: 10px;
         box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
      }

      .login-logo {
         background-color: #003366;
         /* Change to your desired color */
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
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login') }}" method="post" id="registerForm" novalidate>
               @csrf
               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="email" class="form-control" name="email" placeholder="Email" required />
                     <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               <div class="mb-3">
                  <div class="input-group has-validation">
                     <input type="password" class="form-control" name="password" placeholder="Password" required />
                     <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                     <div class="invalid-feedback"></div>
                  </div>
               </div>

               {{-- Custom Text CAPTCHA --}}
               <div class="input-group mb-3">
                  <input type="text" name="captcha" class="form-control" placeholder="Enter the code shown below"
                     required />
                  <div class="input-group-text p-0">
                     <img id="captchaImage" src="{{ url('captcha-image') }}?t={{ time() }}"
                        onclick="this.src='{{ url('captcha-image') }}?t=' + Math.random();" style="cursor:pointer;"
                        alt="captcha" />
                  </div>
                  <div class="invalid-feedback"></div>
               </div>
               @if ($errors->has('captcha'))
                  <span class="text-danger">{{ $errors->first('captcha') }}</span>
               @endif


               <div class="row mb-3">
                  <div class="col-8 d-flex align-items-center">
                     <input class="form-check-input me-2" type="checkbox" id="remember" />
                     <label class="form-check-label" for="remember">Remember Me</label>
                  </div>
                  <div class="col-4">
                     <button type="submit" class="btn btn-primary w-100">Sign In</button>
                  </div>
               </div>
            </form>

            <div class="footer-links">
               {{-- <a href="forgot-password.html">Forgot Password?</a> --}}
               <br />
               <p>
                  <a href="{{ route('register.form') }}" class="btn btn-link">Don’t have an account?</a>
               </p>

            </div>
         </div>
      </div>
   </div>

   <!-- JS Dependencies -->
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

      function validateEmail(input) {
         let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
         if (!regex.test(input.value.trim())) {
            setError(input, "Enter a valid email address.");
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
         let emailInput = form.querySelector("input[name='email']");
         let passwordInput = form.querySelector("input[name='password']");
         let captchaInput = form.querySelector("input[name='captcha']");

         // Live validation
         emailInput.addEventListener("input", () => validateEmail(emailInput));
         passwordInput.addEventListener("input", () => validatePassword(passwordInput));
         captchaInput.addEventListener("input", () => validateCaptcha(captchaInput));

         // Final check on submit
         form.addEventListener("submit", function(e) {
            let isValid =
               validateEmail(emailInput) &
               validatePassword(passwordInput) &
               validateCaptcha(captchaInput);

            if (!isValid) e.preventDefault();
         });
      });
   </script>

</body>

</html>
