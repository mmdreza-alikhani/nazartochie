@extends('admin.layout.master')
@section('title')
     دسته بندی جدید
@endsection
@php
    $activeParent = 'categories';
    $activeChild = 'addCategory'
@endphp
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.categories.index') }}">دسته بندی ها</a></li>
            <li class="breadcrumb-item active">دسته بندی جدید</li>
        </ol>

        <form action="{{ route('admin.categories.store') }}" method="POST" class="row">
        @csrf
            <div class="col-lg-7 col-12 m-x-1">
                <div class="card">
                    <div class="card-header bg-primary">
                        ایجاد
                    </div>
                    <div class="card-body" style="padding: 5px">
                            <div class="row">
                                <div class="form-group col-12 col-lg-4">
                                    <label for="title">عنوان:*</label>
                                    <input id="title" name="title" type="text" value="{{ old('title') }}" class="form-control" required>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="is_active">وضعیت:*</label>
                                    <select class="form-control" id="is_active" name="is_active" required>
                                        <option value="1" selected>فعال</option>
                                        <option value="0">غیرفعال</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-4">
                                    <label for="icon">آیکون:</label>
                                    <input id="icon" name="icon" type="text" value="{{ old('icon') }}" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-12">
                                    <label for="description">توضیحات:</label>
                                    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit" name="submit">ثبت</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">بازگشت</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
