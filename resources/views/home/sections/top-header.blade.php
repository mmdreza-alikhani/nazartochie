<div class="nav text-right" style="direction: rtl">
    <div class="nav__categories js-dropdown">
        <div class="nav__select">
            <div class="btn-select" data-dropdown-btn="tags">تگ ها</div>
            <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                <div class="tags">
                    @foreach($tags as $tag)
                        <a href="#" class="bg-4f80b0">{{ $tag->title }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="nav__menu js-dropdown" style="margin-right: 15px">
        <div class="nav__select">
            <div class="btn-select" data-dropdown-btn="menu">فیلتر پست ها</div>
            <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                <ul class="dropdown__catalog">
                    <li><a href="#">جدید ها</a></li>
{{--                    <li><a href="#">خوانده نشده ها</a></li>--}}
                    <li><a href="#">محبوب ترین ها</a></li>
                    <li><a href="#">دنبال شده ها</a></li>
                </ul>
            </div>
        </div>
        <ul>
            <li class="{{ request()->state == 'latest'  ? 'active' : '' }}"><a href="{{ route('home.sortBy', ['state' => 'latest']) }}">جدید ها</a></li>
{{--            <li class="{{ request()->state == 'unread'  ? 'active' : '' }}"><a href="{{ route('home.sortBy', ['state' => 'unread']) }}">خوانده نشده ها</a></li>--}}
            <li class="{{ request()->state == 'viral'  ? 'active' : '' }}"><a href="{{ route('home.sortBy', ['state' => 'viral']) }}">محبوب ترین ها</a></li>
            <li class="{{ request()->state == 'following'  ? 'active' : '' }}"><a href="{{ route('home.sortBy', ['state' => 'following']) }}">دنبال شده ها</a></li>
        </ul>
    </div>
</div>
