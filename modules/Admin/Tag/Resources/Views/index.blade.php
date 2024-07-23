@extends('admin.layout.master')
@section('title')
    برچسب ها
@endsection
@php
    $activeParent = 'tags';
    $activeChild = ''
@endphp
@section('content')
    <main class="main قخص">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active">برچسب ها</li>
        </ol>
        <a href="{{ route('admin.tags.create') }}" class="btn btn-outline-primary" style="margin: 5px">
            <i class="fa fa-plus"></i>
            افزودن برچسب جدید
        </a>
        <form id="search" class="form-inline" action="{{ route('admin.tags.search') }}" method="GET" style="margin: 5px">
            <input class="form-control form-control-navbar" type="text" placeholder="جستجو با نام تگ" value="{{ request()->has('keyword') ? request()->keyword : '' }}" name="keyword">
        </form>
        <div>
            @if($tags->isEmpty())
                <div class="alert alert-danger" style="margin: 5px">
                    برچسبی یافت نشد!
                </div>
            @else
                <table class="table text-center table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col">تعداد</th>
                        <th scope="col">نام</th>
                        <th scope="col">تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $key => $tag)
                        <tr>
                            <th>
                                {{ $tags->firstItem() + $key }}
                            </th>
                            <td>
                                {{ $tag->title }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('admin.tags.show' , [$tag->id]) }}" class="dropdown-item bg-success" style="text-align: center">
                                            نمایش
                                        </a>
                                        <a href="{{ route('admin.tags.edit' , [$tag->id]) }}" class="dropdown-item bg-primary" style="text-align: center">
                                            ویرایش
                                        </a>
                                        <form action="{{ route('admin.tags.destroy', ['tag' => $tag]) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button class="dropdown-item bg-danger" style="text-align: center">
                                                حذف
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $tags->links() }}
            @endif
        </div>
    </main>
@endsection
