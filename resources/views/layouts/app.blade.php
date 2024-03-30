<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- core:css -->
	<link rel="stylesheet" href="/assets/vendors/core/core.css">
	<!-- endinject -->
    @yield('styles')
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{asset('/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <!-- end plugin css for this page -->
        <!-- inject:css -->
        <link rel="stylesheet" href="{{asset('/assets/fonts/feather-font/css/iconfont.css')}}">
        <link rel="stylesheet" href="{{asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
        <!-- endinject -->
    <!-- Layout styles -->  
        <link rel="stylesheet" href="{{asset('/assets/css/demo_1/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}" />

</head>
<body>
    <div class="main-wrapper">
        @include('admin.partials._sidebar')
        <div class="page-wrapper">
            @include('admin.partials._navbar')
            <div class="page-content">
                @yield('content')
            </div>
            @include('admin.partials._footer')
        </div>


    </div>

    <!-- core:js -->
	<script src="{{asset('/assets/vendors/core/core.js')}}"></script>
	<!-- endinject -->
    @yield('scripts')
    <!-- inject:js -->
    <script src="{{asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/template.js')}}"></script>
    <!-- endinject -->
    
</body>
</html>
