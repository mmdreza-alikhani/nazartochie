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
            <div class="col-lg-12 col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                            نمایش
                        </div>
                        <div class="card-body" style="padding: 5px">
                            <div class="row">
                                <div class="form-group col-12 col-lg-6">
                                    <label>عنوان:</label>
                                    <input type="text" value="{{ $post->title }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>اسلاگ:</label>
                                    <input type="text" value="{{ $post->slug }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-3">
                                    <p>مطرح کننده:</p>
                                    <a href="{{ route('admin.users.show' , ['user' => $post->user->id]) }}">{{ $post->user->username }}</a>
                                </div>
                                <div class="form-group col-12 col-lg-3">
                                    <p>دسته بندی:</p>
                                    <a href="{{ route('admin.categories.show' , ['category' => $post->category->id]) }}">{{ $post->category->title }}</a>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>تگ ها</label>
                                    <div class="form-control" style="background-color: #e9ecef">
                                        @foreach($post->tags as $tag)
                                            {{ $tag->title }}{{ $loop->last ? '' : ',' }}
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-12 col-lg-12">
                                    <label for="description">متن:</label>
                                    <textarea id="description">{!! $post->description !!}</textarea>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <p>وضعبت:</p>
                                    <span style="border-radius: 10px;padding: 5px" class="badge {{ $post->getRawOriginal('is_active') ?  'bg-success' : 'bg-warning' }}">
                                        {{ $post->is_active }}
                                    </span>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <p>نمایش:</p>
                                    <span style="border-radius: 10px;padding: 5px" class="badge {{ $post->getRawOriginal('close_friends') ?  'bg-success' : 'bg-warning' }}">
                                        {{ $post->close_friends }}
                                    </span>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>تاریخ ایجاد:</label>
                                    <input type="text" value="{{ verta($post->created_at) }}" class="form-control" disabled>
                                </div>
                                <div class="form-group col-12 col-lg-6">
                                    <label>تاریخ آخرین تغییرات:</label>
                                    <input type="text" value="{{ verta($post->updated_at) }}" class="form-control" disabled>
                                </div>
                            </div>
                            <a href="{{ route('admin.posts.index') }}" class="btn btn-danger">بازگشت</a>
                        </div>
                    </div>
            </div>
        </div>
        <!--/.container-fluid-->
    </main>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#description').summernote('disable');
        });
    </script>
@endsection
