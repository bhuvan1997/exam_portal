<!doctype html>
<html lang="en">
<!--HEADER-->
@include('landing.layout.header')
<!-- HEADER -->
@yield('css')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--NAVBAR-->
        @include('landing.layout.navbar')
        <!--NAVBAR-->

        <!--begin::App Main-->
        @yield('content')
        <!--end::App Main-->

        <!--FOOTER-->
        @include('landing.layout.footer')
        <!--FOOTER-->
    </div>
    <!--end::App Wrapper-->
    <!--SCRIPT-->

    @include('landing.layout.script')

    <!--SCRIPT-->
</body>
<!--end::Body-->

</html>
