@extends('admin.layout.master')
@section('title')
    {{ $post->title }}
@endsection
@php
    $activeParent = 'posts';
    $activeChild = 'newpost'
@endphp
@section('content')
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active"><a href="{{ route('admin.posts.index') }}">دسته بندی ها</a></li>
            <li class="breadcrumb-item active">{{ $post->title }}</li>
        </ol>

        <div>
            <form action="{{ route('admin.posts.rejection' , ['post' => $post->id]) }}" method="POST" class="row">
                @csrf
                <div class="col-lg-7 col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                                رد صلاحیت
                        </div>
                        <div class="card-body" style="padding: 5px">
                            <div class="row">
                                <div class="form-group col-12 col-lg-12">
                                    <label>دلیل رد صلاحیت:</label>
                                    <textarea name="reason"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-outline-warning" type="submit" name="submit">رد صلاحیت</button>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">بازگشت</a>
                        </div>
                    </div>
                </div>
            </form>
        <!--/.container-fluid-->
    </main>
@endsection
