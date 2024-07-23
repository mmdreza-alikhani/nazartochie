<!doctype html>
<html lang="en-US">
<head>
    @include('home.sections.links')
</head>
<body>
@include('home.sections.header')

@yield('content')

@include('home.sections.footer')
@include('home.sections.scripts')
@yield('scripts')
</body>
</html>
