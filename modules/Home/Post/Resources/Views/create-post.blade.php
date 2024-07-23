@extends('home.layout.master')

@section('title')
    بیان مشکل
@endsection

@section('content')
    <main style="direction: rtl" class="text-right">
        <div class="container">
            <div class="create">
                <div class="create__head">
                    <div class="create__title"><img src="/home/fonts/icons/main/New_Topic.svg" alt="New topic">ایجاد موضوع جدید</div>
                    <span><a class="btn btn-secondary">قوانین</a></span>
                </div>
                @include('home.sections.errors')
                <form method="POST" action="{{ route('home.posts.store') }}">
                    @csrf
                    <div class="create__section">
                        <label class="create__label" for="title">عنوان:*</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="create__section">
                                <label class="create__label" for="category">دسته بندی:*</label>
                                <label class="custom-select">
                                    <select id="category" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="create__section">
                                <label for="tagSelect">برچسب ها:*</label>
                                <label class="custom-select" for="tagSelect">
                                    <select id="tagSelect" name="tag_ids[]" multiple required>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="create__section create__textarea">
                        <label class="create__label" for="description">توضیحات</label>
                        <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                    </div>
                    <div class="create__section">
                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="create__section">
                                    <div class="create__radio">
                                        <label class="create__box">
                                            <label class="custom-radio">
                                                <input type="checkbox" name="canSeeFriends">
                                                <i></i>
                                            </label>
                                            <span>نمایش فقط برای دوستان</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="create__footer">
                        <button type="submit" class="create__btn-create btn btn--type-02">ثبت</button>
                        <a href="#" class="create__btn-cansel btn">بازگشت</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#tagSelect').select2({
                placeholder: 'انتخاب کنید..',
                dir: 'rtl'
            });
            $('#description').summernote();
        });
    </script>
@endsection
