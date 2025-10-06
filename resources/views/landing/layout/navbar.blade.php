
<nav class="app-header navbar navbar-expand-lg bg-body border-bottom shadow-sm">
  <div class="container-fluid">
    <!-- Brand Logo / Name -->
    <a class="navbar-brand fw-bold text-primary" href="#">EXAM PORTAL</a>

    <!-- Toggle button for mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarContent">

      <!-- Login / Register Buttons -->
      <div class="d-flex ms-lg-3 gap-2">
        <a href="{{ route('login.form') }}" class="btn btn-outline-primary">Login</a>
        <a href="{{ route('register.form') }}" class="btn btn-primary">Register</a>
      </div>
    </div>
  </div>
</nav>
