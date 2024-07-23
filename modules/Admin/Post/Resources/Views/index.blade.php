@extends('admin.layout.master')
@section('title')
    مشکلات
@endsection
@php
    $activeParent = 'posts';
    $activeChild = ''
@endphp
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active">مشکلات</li>
        </ol>
        <div>
            @if($posts->isEmpty())
                <div class="alert alert-danger" style="margin: 5px">
                    مشکلی یافت نشد!
                </div>
            @else
                <table class="table text-center table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col">تعداد</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">مطرح کننده</th>
                        <th scope="col">وضعیت نمایش</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <th>
                                {{ $posts->firstItem() + $key }}
                            </th>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td>
                                <a href="{{ route('admin.users.show' , ['user' => $post->user->id]) }}">{{ $post->user->username }}</a>
                            </td>
                            <td>
                                <span style="border-radius: 10px;padding: 5px" class="badge {{ $post->getRawOriginal('close_friends') ?  'bg-info' : 'bg-success' }}">
                                    {{ $post->close_friends }}
                                </span>
                            </td>
                            <td>
                                <span style="border-radius: 10px;padding: 5px" class="badge {{ $post->getRawOriginal('is_active') ?  'bg-success' : 'bg-warning' }}">
                                    {{ $post->is_active }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('admin.posts.show' , [$post->id]) }}" class="dropdown-item bg-success" style="text-align: center">
                                            نمایش
                                        </a>
                                        <a href="{{ route('admin.posts.not_qualified' , ['post' => $post->id]) }}" class="dropdown-item bg-primary" style="text-align: center">
                                            رد صلاحیت
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            @endif
        </div>
    </main>
@endsection
