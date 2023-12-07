<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('backend.layouts.style')
</head>
<body>
    @include('backend.layouts.header')
    @include('backend.layouts.sidebar')
    @yield('content')
    @include('backend.layouts.footer')
</body>
@include('backend.layouts.script')
</html>