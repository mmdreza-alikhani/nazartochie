@extends('admin.layout.master')
@section('title')
    {{ $user->username }}
@endsection
@php
    $activeParent = 'users';
    $activeChild = 'newUser'
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

            <div>
                <div class="col-lg-7 col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            نمایش
                        </div>
                        <div class="card-body" style="padding: 5px">
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label>نام کاربری:</label>
                                    <input type="text" value="{{ $user->username }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>ایمیل</label>
                                    <div class="input-group-prepend">
                                        <input type="email" value="{{ $user->email }}" class="form-control" disabled>
                                        @if($user->email_verified_at == null)
                                            <div class="input-group-text">
                                                <i class="fa fa-times-circle text-danger"></i>
                                            </div>
                                        @else
                                            <div class="input-group-text">
                                                <i class="fa fa-check-circle text-success"></i>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>وضعیت:</label>
                                    <input type="text" value="{{ $user->status }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>طریقه ثبت نام</label>
                                    <input type="text" value="{{ $user->provider_name }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>تاریخ ایجاد:</label>
                                    <input type="text" value="{{ verta($user->created_at) }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>تاریخ آخرین تغییرات:</label>
                                    <input type="text" value="{{ verta($user->updated_at) }}" class="form-control" disabled>
                                </div>
                            </div>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-danger">بازگشت</a>
                        </div>
                    </div>
                </div>

            </div>
        <!--/.container-fluid-->
    </main>
@endsection
