@extends('admin.layout.master')
@section('title')
    دسته بندی ها
@endsection
@php
    $activeParent = 'categories';
    $activeChild = ''
@endphp
@section('content')
    <main class="main">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">خانه</li>
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">مدیریت</a>
            </li>
            <li class="breadcrumb-item active">دسته بندی ها</li>
        </ol>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-primary" style="margin: 5px">
            <i class="fa fa-plus"></i>
            افزودن دسته بندی جدید
        </a>
        <div>
            @if($categories->isEmpty())
                <div class="alert alert-danger" style="margin: 5px">
                    دسته بندی یافت نشد!
                </div>
            @else
                <table class="table text-center table-responsive-sm">
                    <thead>
                    <tr>
                        <th scope="col">تعداد</th>
                        <th scope="col">نام</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تنظیمات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $key => $category)
                        <tr>
                            <th>
                                {{ $categories->firstItem() + $key }}
                            </th>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                <span style="border-radius: 10px;padding: 5px" class="badge {{ $category->getRawOriginal('is_active') ?  'bg-success' : 'bg-warning' }}">
                                    {{ $category->is_active }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                                        <i class="icon-settings"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('admin.categories.show' , [$category->id]) }}" class="dropdown-item bg-success" style="text-align: center">
                                            نمایش
                                        </a>
                                        <a href="{{ route('admin.categories.edit' , [$category->id]) }}" class="dropdown-item bg-primary" style="text-align: center">
                                            ویرایش
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            @endif
        </div>
    </main>
@endsection
