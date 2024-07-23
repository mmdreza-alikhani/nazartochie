<header style="direction: rtl" class="text-right">
    <div class="header js-header js-dropdown">
        <div class="container">
            <div class="header__logo">
                <div class="header__logo-btn" style="font-size: small" data-dropdown-btn="logo">
                    نظر تو چیه؟
                </div>
                <h1>
                    <img src="/home/fonts/icons/main/Logo_Forum.svg" alt="logo">
                </h1>
            </div>
            <div class="header__search">
                <form action="#">
                    <input type="search" placeholder="جستجو" class="form-control" style="padding-right: 50px">
                    <i class="icon-Search js-header-search-btn-open text-left"></i>
                    <div class="header__search-close js-header-search-btn-close"><i class="icon-Cancel"></i></div>
                </form>
            </div>
            <div class="header__menu">
                <div class="header__menu-btn" data-dropdown-btn="menu">
                    <i class="icon-Menu_Icon"></i>مشکلات
                </div>
                <nav class="dropdown dropdown--design-01" data-dropdown-list="menu">
                    <div>
                        <ul class="dropdown__catalog row">
                            <li class="col-xs-6"><a href="{{ route('home.posts.create') }}">بیان مشکل</a></li>
                            <li class="col-xs-6"><a href="#">پشتیبانی</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3>دسته بندی ها</h3>
                        <ul class="dropdown__catalog row">
                            @php
                                $categories = \App\Models\Category::where('is_active', '1')->get();
                            @endphp
                            @foreach($categories as $category)
                                <li class="col-xs-6"><a href="#" class="category"><i class="bg-f9bc64"></i>{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </nav>
            </div>
{{--            <div class="header__notification">--}}
{{--                <div class="header__notification-btn" data-dropdown-btn="notification">--}}
{{--                    <i class="icon-Notification"></i>--}}
{{--                    <span>6</span>--}}
{{--                </div>--}}
{{--                <div class="dropdown dropdown--design-01" data-dropdown-list="notification">--}}
{{--                    <div style="background-color: #eaeaea">--}}
{{--                        <a href="#">--}}
{{--                            <i class="icon-Favorite_Topic"></i>--}}
{{--                            <p>Roswell . 16 feb, 17<span>Which movie have you watched recently?</span></p>--}}
{{--                        </a>--}}
{{--                        <span><a href="#">view older notifications...</a></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="header__user">

                @if(auth()->user())
                    <div class="header__user-btn" data-dropdown-btn="user">
                        <i class="icon-Arrow_Below"></i>
                        {{ auth()->user()->username }}
                        <img src="{{ env('USER_PROFILE') . auth()->user()->avatar }}" alt="avatar">
                    </div>
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="user">
                        <div>
                            <div class="dropdown__icons">
                                <a href="#"><i class="icon-Bookmark"></i></a>
                                <a href="{{ route('home.profile.info') }}"><i class="icon-Preferences"></i></a>
                                <a href="#"><i class="icon-Logout"></i></a>
                            </div>
                        </div>
                        <div>
                            <ul class="dropdown__catalog">
                                <li><a href="#">تنظیمات</a></li>
                                <li><a href="#">گروه ها</a></li>
                                <li><a href="#">اعلانات</a></li>
                                <li><a href="#">ذخیره شده ها</a></li>
                            </ul>
                        </div>
                    </nav>
                @else
                    <div class="btn btn-info" style="border-radius: 15px">
                        <a href="{{ route('login') }}">
                            ورود
                        </a>
                        <p>{{ ' ' . ' | ' . ' ' }}</p>
                        <a href="{{ route('register') }}">
                             ثبت نام
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
