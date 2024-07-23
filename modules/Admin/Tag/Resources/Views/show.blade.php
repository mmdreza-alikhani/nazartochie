@extends('admin.layout.master')
@section('title')
    {{ $tag->title }}
@endsection
@php
    $activeParent = 'tags';
    $activeChild = 'newTag'
@endphp
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.tags.index') }}">دسته بندی ها</a></li>
            <li class="breadcrumb-item active">{{ $tag->title }}</li>
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
                                <input type="text" value="{{ $tag->title }}" class="form-control" disabled>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label>تاریخ ایجاد:</label>
                                <input type="text" value="{{ verta($tag->created_at) }}" class="form-control" disabled>
                            </div>
                            <div class="form-group col-12 col-lg-6">
                                <label>تاریخ آخرین تغییرات:</label>
                                <input type="text" value="{{ verta($tag->updated_at) }}" class="form-control" disabled>
                            </div>
                        </div>
                        <a href="{{ route('admin.tags.index') }}" class="btn btn-danger">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
