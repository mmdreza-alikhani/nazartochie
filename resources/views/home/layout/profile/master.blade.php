@extends('home.layout.master')

@section('title')
    {{ $user->username }}
@endsection

@section('content')
    <div>
        <div class="col-12 col-md-9 bg-info" style="height: 500px">
            @yield('profileContent')
        </div>
        <div class="col-12 col-md-3 bg-success text-right" style="direction: rtl">
            <div style="display: flex;justify-content: center; margin: 10px">
                <div style="max-width: 150px;display: flex;justify-content: center;align-items: center">
                    <label class="-label" for="file">
                        <span style="display: none;max-width: fit-content">تغییر پروفایل</span>
                    </label>
                    <img src="{{ Str::contains($user->avatar, 'https://') ? $user->avatar : env('USER_PROFILE') . '/' . $user->avatar }}" alt="{{ $user->username }}-profile" id="output" width="200" />
                </div>
            </div>
            <p class="text-center">
                {{ $user->username }}
            </p>
            <div class="information text-center m-2">
                <button type="submit" class="create__btn-create btn btn--type-02">دنبال کردن</button>
                <ul>
                    <li>
                        دنبال کننده ها: 255 نفر
                        |
                        دنبال شده ها: 255 نفر
                    </li>
                    <li>
                        <a class="{{ $active == 'info' ? 'active-link' : '' }}" href="{{ route('home.profile.info') }}">
                            تغییر اطلاعات
                        </a>
                    </li>
                    <li>
                        <a class="{{ $active == 'contacts' ? 'active-link' : '' }}" href="{{ route('home.profile.contacts') }}">
                            مخاطبین
                        </a>
                    </li>
                    <li>
                        <a class="{{ $active == 'posts' ? 'active-link' : '' }}" href="{{ route('home.profile.posts') }}">
                            پست های ثبت شده
                        </a>
                    </li>
                    <li>
                        <a class="{{ $active == 'comments' ? 'active-link' : '' }}" href="{{ route('home.profile.comments') }}">
                            نظرات
                        </a>
                    </li>
                    <li>
                        <a class="{{ $active == 'bookmarks' ? 'active-link' : '' }}" href="{{ route('home.profile.bookmarks') }}">
                            علاقمندی ها
                        </a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                    <button type="submit" class="create__btn-create btn btn--type-02">خروج از حساب کاربری</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@include('home.sections.create-post')
