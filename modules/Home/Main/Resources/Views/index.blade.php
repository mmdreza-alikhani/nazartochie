@extends('home.layout.master')

@section('title')
    صفحه اصلی
@endsection

@section('content')
    <main>
        <div class="container">
            @include('home.sections.top-header')
            <div class="posts text-right" style="direction: rtl">
                <div class="posts__head">
                    <div class="posts__topic">موضوع</div>
                    <div class="posts__category">دسته بندی</div>
                    <div class="posts__users">کاربران فعال</div>
                    <div class="posts__replies">نظرات</div>
                    <div class="posts__views">بازدیدها</div>
                    <div class="posts__activity">آخرین فعالیت</div>
                </div>
                <div class="posts__body">
{{--                    <div class="posts__item bg-fef2e0">--}}
{{--                        <div class="posts__section-left">--}}
{{--                            <div class="posts__topic">--}}
{{--                                <div class="posts__content">--}}
{{--                                    <a href="#">--}}
{{--                                        <h3><i><img src="fonts/icons/main/Pinned.svg" alt="Pinned"></i>Welcome New Users! Please read this before posting!</h3>--}}
{{--                                    </a>--}}
{{--                                    <p>Congratulations, you have found the Community! Before you make a new topic or Post, please read community guidelines.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="posts__section-right">--}}
{{--                            <div class="posts__users js-dropdown">--}}
{{--                                <div>--}}
{{--                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/B.svg" alt="avatar" data-dropdown-btn="user-b"></a>--}}
{{--                                    <div class="posts__users-dropdown dropdown dropdown--user dropdown--reverse-y" data-dropdown-list="user-b">--}}
{{--                                        <div class="dropdown__user">--}}
{{--                                            <a href="#" class="dropdown__user-label bg-218380">B</a>--}}
{{--                                            <div class="dropdown__user-nav">--}}
{{--                                                <a href="#"><i class="icon-Add_User"></i></a>--}}
{{--                                                <a href="#"><i class="icon-Message"></i></a>--}}
{{--                                            </div>--}}
{{--                                            <div class="dropdown__user-info">--}}
{{--                                                <a href="#">Tesla Motors</a>--}}
{{--                                                <p>Last Post 4 hours ago. Joined Jun 1, 16</p>--}}
{{--                                            </div>--}}
{{--                                            <div class="dropdown__user-icons">--}}
{{--                                                <a href="#"><img src="fonts/icons/badges/Intermediate.svg" alt="user-icon"></a>--}}
{{--                                                <a href="#"><img src="fonts/icons/badges/Bot.svg" alt="user-icon"></a>--}}
{{--                                                <a href="#"><img src="fonts/icons/badges/Animal_Lover.svg" alt="user-icon"></a>--}}
{{--                                            </div>--}}
{{--                                            <div class="dropdown__user-statistic">--}}
{{--                                                <div>Threads - <span>1184</span></div>--}}
{{--                                                <div>Posts - <span>5,863</span></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/K.svg" alt="avatar"></a>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <a href="#" class="avatar"><img src="fonts/icons/avatars/O.svg" alt="avatar"></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="posts__replies">66</div>--}}
{{--                            <div class="posts__views">15.1k</div>--}}
{{--                            <div class="posts__activity">11d</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    @foreach($posts as $post)
                        <div class="posts__item bg-f2f4f6">
                            <div class="posts__section-left">
                                <div class="posts__topic">
                                    <div class="posts__content">
                                        <a href="{{ route('home.posts.show', ['post' => $post->slug]) }}">
                                            <h3>{{ $post->title }}</h3>
                                        </a>
                                        <div class="posts__tags tags">
                                            @foreach($post->tags as $tag)
                                                <a href="#" class="bg-4f80b0">{{ $tag->title }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>{{ $post->category->title }}</a></div>
                            </div>
                            <div class="posts__section-right">
                                <div class="posts__users">
                                    @foreach($post->activeUsers as $comment)
                                        <div>
                                            <a href="#" class="avatar"><img src="{{ env('USER_PROFILE') . $comment->user->avatar }}" alt="{{ $comment->user->username . '-avatar' }}"></a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="posts__replies">{{ $post->comments->count() }}</div>
                                <div class="posts__views">{{ views($post)->unique()->count() }}</div>
                                <div class="posts__activity">{{ $post->updated_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
@endsection

@include('home.sections.create-post')
