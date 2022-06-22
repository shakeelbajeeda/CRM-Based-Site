<!DOCTYPE html>
<html>

<head>
    @include('website.include.css_files')
</head>

<body>
    @include('website.include.header')
    @yield('content')
    @include('website.include.footer')
    @include('website.include.js_files')
</body>
</html>
