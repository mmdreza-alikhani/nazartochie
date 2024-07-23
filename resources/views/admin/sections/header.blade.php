<header class="navbar">
    <div class="container-fluid">
        <button class="navbar-toggler mobile-toggler hidden-lg-up" type="button">&#9776;</button>
        <a class="navbar-brand" href="#"></a>
        <ul class="nav navbar-nav hidden-md-down">
            <li class="nav-item">
                <a class="nav-link navbar-toggler layout-toggler" href="#">&#9776;</a>
            </li>

            <li class="nav-item p-x-1">
                <a class="nav-link" href="#">داشبورد</a>
            </li>
            <li class="nav-item p-x-1">
                <a class="nav-link" href="#">Users</a>
            </li>
            <li class="nav-item p-x-1">
                <a class="nav-link" href="#">Settings</a>
            </li>
{{--            @if (Route::has('login'))--}}
{{--                @auth--}}
{{--                    <li class="nav-item p-x-1">--}}
{{--                        <a class="nav-link" href="{{ url('/dashboard') }}">داشیورد</a>--}}
{{--                    </li>--}}
{{--                @else--}}
{{--                    <li class="nav-item p-x-1">--}}
{{--                        <a class="nav-link" href="{{ route('login') }}">لاگین</a>--}}
{{--                    </li>--}}
{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item p-x-1">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">رجیستر</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @endauth--}}
{{--            @endif--}}
        </ul>
        <ul class="nav navbar-nav pull-left">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-bell"></i><span class="tag tag-pill tag-danger">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-xs-center">
                        <strong>تنظیمات</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> پروفایل</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> تنظیمات</a>
                    <!--<a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="tag tag-default">42</span></a>-->
                    <div class="divider"></div>
                    <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> خروج</a>
                </div>
            </li>
        </ul>
    </div>
</header>
