@extends('admin.layout.master')
@section('title')
    کاربران
@endsection
@php
    $activeParent = 'users';
    $activeChild = ''
@endphp
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active">کاربران</li>
        </ol>
        <a href="{{ route('admin.users.create') }}" class="btn btn-outline-primary" style="margin: 5px">
            <i class="fa fa-plus"></i>
            افزودن کاربر جدید
        </a>
        <form id="search" class="form-inline" action="{{ route('admin.users.search') }}" method="GET" style="margin: 5px">
            <input class="form-control form-control-navbar" type="text" placeholder="جستجو با نام کاربری" value="{{ request()->has('keyword') ? request()->keyword : '' }}" name="keyword">
        </form>
        <div>
            @if($users->isEmpty())
                <div class="alert alert-danger" style="margin: 5px">
                    کاربری یافت نشد!
                </div>
            @else
                <table class="table text-center table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col">تعداد</th>
                        <th scope="col">نام کاربری</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <th>
                                {{ $users->firstItem() + $key }}
                            </th>
                            <td>
                                {{ $user->username }}
                            </td>
                            <td>
                                <span style="border-radius: 10px;padding: 5px" class="badge {{ $user->getRawOriginal('status') ?  'bg-success' : 'bg-warning' }}">
                                    {{ $user->status }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('admin.users.show' , ['user' => $user->id]) }}" class="dropdown-item bg-success" style="text-align: center">
                                            نمایش
                                        </a>
                                        <a href="{{ route('admin.users.edit' , [$user->id]) }}" class="dropdown-item bg-primary" style="text-align: center">
                                            ویرایش
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            @endif
        </div>
    </main>
@endsection
