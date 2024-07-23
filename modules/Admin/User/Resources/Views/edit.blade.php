@extends('admin.layout.master')
@section('title')
    {{ $user->username }}
@endsection
@php
    $activeParent = 'users';
    $activeChild = 'editUser'
@endphp
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">کاربران</a></li>
            <li class="breadcrumb-item active">{{ $user->username }}</li>
        </ol>

        <form action="{{ route('admin.users.update' , ['user' => $user->id]) }}" method="POST" class="row">
        @csrf
        @method('put')
            <div class="col-lg-7 col-12 m-x-1">
                <div class="card">
                    <div class="card-header bg-primary">
                        ویرایش
                    </div>
                    <div class="card-body" style="padding: 5px">
                        @include('admin.sections.errors')
                        <div class="row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="username">نام کاربری:*</label>
                                <input id="username" name="username" type="text" value="{{ $user->username }}" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="email">ایمیل:*</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="password">رمز عبور:*</label>
                                <input type="password" name="password" value="در صورت خالی گذاشتن رمز عبور تغییری نمیکند!" class="form-control">
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label for="status">وضعیت:*</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1" {{ $user->getRawOriginal('status') ? 'selected' : '' }} >فعال</option>
                                    <option value="0" {{ $user->getRawOriginal('status') ? '' : 'selected' }} >غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">ویرایش</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">بازگشت</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
