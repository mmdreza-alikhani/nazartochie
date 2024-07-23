@extends('admin.layout.master')
@section('title')
    {{ $tag->title }}
@endsection
@php
    $activeParent = 'tags';
    $activeChild = 'editTag'
@endphp
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.tags.index') }}">برچسب ها</a></li>
            <li class="breadcrumb-item active">{{ $tag->title }}</li>
        </ol>

        <form action="{{ route('admin.tags.update' , ['tag' => $tag->id]) }}" method="POST" class="row">
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
                                <input id="title" name="title" type="text" value="{{ $tag->title }}" class="form-control" required>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">ویرایش</button>
                        <a href="{{ route('admin.tags.index') }}" class="btn btn-danger">بازگشت</a>
                    </div>
                </div>
            </div>
        </form>
    </main>
@endsection
