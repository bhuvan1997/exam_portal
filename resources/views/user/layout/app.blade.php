<!doctype html>
<html lang="en">
<!--HEADER-->
@include('user.layout.header')
<!-- HEADER -->
@yield('css')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--NAVBAR-->
        @include('user.layout.navbar')
        <!--NAVBAR-->

        <!--begin::App Main-->
        @yield('content')
        <!--end::App Main-->

        <!--FOOTER-->
        @include('user.layout.footer')
        <!--FOOTER-->
    </div>
    <!--end::App Wrapper-->
    <!--SCRIPT-->

    @include('user.layout.script')

    <!--SCRIPT-->
</body>
<!--end::Body-->

</html>
