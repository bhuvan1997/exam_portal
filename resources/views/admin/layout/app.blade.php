<!doctype html>
<html lang="en">
<!--HEADER-->
@include('admin.layout.header')
<!-- HEADER -->
@yield('css')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--NAVBAR-->
        @include('admin.layout.navbar')
        <!--NAVBAR-->

        <!--begin::App Main-->
        @yield('content')
        <!--end::App Main-->

        <!--FOOTER-->
        @include('admin.layout.footer')
        <!--FOOTER-->
    </div>
    <!--end::App Wrapper-->
    <!--SCRIPT-->

    @include('admin.layout.script')

    <!--SCRIPT-->
</body>
<!--end::Body-->

</html>
