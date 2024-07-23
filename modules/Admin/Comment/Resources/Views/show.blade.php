@extends('admin.layout.master')
@section('title')
    {{ $category->title }}
@endsection
@php
    $activeParent = 'categories';
    $activeChild = 'newCategory'
@endphp
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.categories.index') }}">دسته بندی ها</a></li>
            <li class="breadcrumb-item active">{{ $category->title }}</li>
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
                                    <label>عنوان:</label>
                                    <input type="text" value="{{ $category->title }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>نام انگلیسی:</label>
                                    <input type="text" value="{{ $category->slug }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>وضعیت:</label>
                                    <input type="text" value="{{ $category->is_active }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>آیکون:</label>
                                    <input type="text" value="{{ $category->icon }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-12">
                                    <label>توضیحات:</label>
                                    <textarea class="form-control" disabled>{{ $category->description }}</textarea>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>تاریخ ایجاد:</label>
                                    <input type="text" value="{{ verta($category->created_at) }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>تاریخ آخرین تغییرات:</label>
                                    <input type="text" value="{{ verta($category->updated_at) }}" class="form-control" disabled>
                                </div>
                            </div>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">بازگشت</a>
                        </div>
                    </div>
                </div>

            </div>
        <!--/.container-fluid-->
    </main>
@endsection
