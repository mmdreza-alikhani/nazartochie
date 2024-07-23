@extends('admin.layout.master')
@section('title')
     کاربر جدید
@endsection
@php
    $activeParent = 'users';
    $activeChild = 'addUser';
@endphp
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}">دسته بندی ها</a></li>
            <li class="breadcrumb-item active">دسته بندی جدید</li>
        </ol>

        <form action="{{ route('admin.users.store') }}" method="POST" class="row">
        @csrf
            <div class="col-lg-8 col-12 m-x-1">
                <div class="card">
                    <div class="card-header bg-primary">
                        ایجاد
                    </div>
                    <div class="card-body" style="padding: 5px">
                        <div class="row">
                            <div class="form-group col-12 col-lg-6">
                                <label for="username">نام کاربری:*</label>
                                <input id="username" name="username" type="text" value="{{ old('username') }}" class="form-control" required>
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="email">ایمیل:*</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control" required>
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="password">رمز عبور:*</label>
                                <input id="password" name="password" type="password" value="{{ old('password') }}" class="form-control" required>
                            </div>

                            <div class="form-group col-12 col-lg-6">
                                <label for="status">وضعیت:*</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="1" selected>فعال</option>
                                    <option value="0">غیرفعال</option>
                                </select>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit" name="submit">ثبت</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-danger">بازگشت</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
