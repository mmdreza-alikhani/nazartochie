@extends('admin.layout.master')
@section('title')
    {{ $category->title }}
@endsection
@php
    $activeParent = 'categories';
    $activeChild = 'editCategory'
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

        <form action="{{ route('admin.categories.update' , ['category' => $category->id]) }}" method="POST" class="row">
        @csrf
        @method('put')
            <div class="col-lg-7 col-12 m-x-1">
                <div class="card">
                    <div class="card-header bg-primary">
                        ویرایش
                    </div>
                    <div class="card-body" style="padding: 5px">
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label for="title">عنوان:*</label>
                                    <input id="title" name="title" type="text" value="{{ $category->title }}" class="form-control" required>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>نام انگلیسی:</label>
                                    <input type="text" value="{{ $category->slug }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="is_active">وضعیت:*</label>
                                    <select class="form-control" id="is_active" name="is_active" required>
                                        <option value="1" {{ $category->getRawOriginal('is_active') ? 'selected' : '' }} >فعال</option>
                                        <option value="0" {{ $category->getRawOriginal('is_active') ? '' : 'selected' }} >غیرفعال</option>
                                    </select>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label for="icon">آیکون:</label>
                                    <input id="icon" name="icon" type="text" value="{{ $category->icon }}" class="form-control">
                                </div>
                                <div class="form-group col-12 col-lg-12">
                                    <label for="description">توضیحات:</label>
                                    <textarea id="description" name="description" class="form-control">{{ $category->description }}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" name="submit">ویرایش</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-danger">بازگشت</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
