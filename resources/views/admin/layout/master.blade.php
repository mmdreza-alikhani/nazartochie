<!DOCTYPE html>
<html lang="IR-fa" dir="rtl">
@include('admin.sections.links')
<body class="navbar-fixed sidebar-nav fixed-nav">

@include('admin.sections.header')
@include('admin.sections.sidebar')

<!-- Main content -->
@yield('content')
<!-- End:Main content -->

@include('admin.sections.footer')

@include('admin.sections.scripts')
@yield('scripts')
</body>
</html>
