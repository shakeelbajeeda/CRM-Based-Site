<!DOCTYPE html>
<html>

<head>

 {{-- Login and Register page links  --}}
 <link rel="stylesheet" type="text/css" href="{{asset('website/vendor/bootstrap/css/bootstrap.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('website/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('website/vendor/animate/animate.css')}}">
 <link rel="stylesheet" type="text/css" href="{{assert('websitevendor/css-hamburgers/hamburgers.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('website/vendor/select2/select2.min.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('website/css/util.css')}}">
 <link rel="stylesheet" type="text/css" href="{{asset('website/css/main.css')}}">
 <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    @yield('content')
    @include('website.include.js_files')
</body>
</html>
