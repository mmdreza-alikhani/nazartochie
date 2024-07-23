@extends('home.layout.profile.master')

@php
    $active = 'info'
@endphp

@section('title')
    اطلاعات کاربری
@endsection

@section('profileContent')
    <div class="text-right" style="direction: rtl">
        @include('home.sections.errors')
        <div class="col-12 col-md-6" style="direction: rtl">
            <form method="POST" action="{{ route('verification.send') }}" class="w-100 p-5">
                @csrf
                    @include('admin.sections.errors')
                    <label for="email">ایمیل شما:</label>
                    <input type="email" class="form-control" style="background-color: transparent; max-width: max-content" id="email" value="{{ $user->email }}" name="email" disabled>
                    <div>
                        ایمیلی حاوی لینک تایید به ایمیل شما ارسال میشود.
                    </div>
                    <button class="btn btn-success" type="submit">
                        تایید ایمیل
                    </button>
            </form>
        </div>
{{--    ectype یادت نرهههههههههههههههههههه    --}}
        <div class="col-12 col-md-6">
            <form method="POST" action="{{ route('home.profile.update') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="user_id">
                <div class="profile-pic" style="max-width: fit-content;display: flex;justify-content: center;align-items: center">
                    <label class="-label" for="file">
                        <span class="glyphicon glyphicon-camera"></span>
                        <span style="display: none;max-width: fit-content">تغییر پروفایل</span>
                    </label>
                    <input id="file" type="file" onchange="(event)" name="avatar"/>
                    <img src="{{ Str::contains($user->avatar, 'https://') ? $user->avatar : env('USER_PROFILE') . '/' . $user->avatar }}" alt="{{ $user->username }}-profile" id="output" width="200" />
                </div>
                <div class="create__section" style="max-width: max-content">
                    <label class="create__label" for="username">نام کاربری:*</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>

                <label for="email">ایمیل:</label>
                @if($user->email_verified_at == null)
                    <i class="fa fa-times-circle text-danger">ایمیل شما تایید نشده!</i>
                @else
                    <i class="fa fa-check-circle text-success"></i>
                @endif
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="example@gmail.com" id="email" value="{{ $user->email }}" name="email">
                </div>
                <button class="btn btn-success w-100" type="submit">ثبت</button>
            </form>
        </div>
    </div>
@endsection
