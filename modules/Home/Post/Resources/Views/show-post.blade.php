@extends('home.layout.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <main>
        <div class="container">
            <div class="topics text-right" style="direction: rtl">
                <div class="topics__heading">
                    <h2 class="topics__heading-title">{{ $post->title }}</h2>
                    <a href="#" class="category"><i class="bg-3ebafa"></i>{{ $post->category->title }}</a>
                    <div class="topics__heading-info">
                        <div class="tags">
                            @foreach($post->tags as $tag)
                                <a href="#" class="bg-424ee8">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="topics__body">
                    <div class="topics__content">
                        <div class="topic">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img src="{{ env('USER_PROFILE') . $post->user->avatar }}" alt="{{ $post->user->username . '-Avatar' }}"></a>
                                </div>
                                <div class="topic__caption" style="margin-right: 5px">
                                    <div class="topic__name">
                                        <a href="#">{{ $post->user->username }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                    <p>
                                        {!! $post->description !!}
                                    </p>
                                </div>
                                <div class="topic__footer text-left" style="direction: ltr">
                                    <div class="topic__footer-likes">
                                        <div>
                                            <a href="{{ route('home.posts.storeReaction', ['post' => $post, 'reaction' => '1']) }}"><i class="icon-Upvote"></i></a>
                                            <span>{{ $post->reactions("1")->count() }}</span>
                                        </div>
                                        <div>
                                            <a href="{{ route('home.posts.storeReaction', ['post' => $post, 'reaction' => '2']) }}"><i class="icon-Downvote"></i></a>
                                            <span>{{ $post->reactions("2")->count() }}</span>
                                        </div>
                                        <div>
                                            <a href="{{ route('home.posts.storeReaction', ['post' => $post, 'reaction' => '3']) }}"><i class="icon-Favorite_Topic"></i></a>
                                            <span>{{ $post->reactions("3")->count() }}</span>
                                        </div>
                                    </div>
                                    <div class="topic__footer-share">
                                        <button type="button" data-toggle="modal" data-target="#exampleModal">
                                            <i class="icon-Reply_Fill"></i>
                                        </button>
                                    </div>

                                    <!-- Add Comment Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-right" id="exampleModalLabel">ثبت نظر</h5>
                                                </div>
                                                <div class="modal-body">
                                                @if(!auth()->check())
                                                    <div class="alert alert-danger text-right">
                                                        لطفا اول ثبت نام کنید.
                                                    </div>
                                                @else
                                                    <form method="POST" action="{{ route('home.posts.comments.store', ['post' => $post]) }}">
                                                        @csrf
                                                        <label style="width: 100%">
                                                            <textarea class="form-control" id="text" name="text" required>{{ old('text') }}</textarea>
                                                            <input type="hidden" name="replyOf" id="replyOf" value="0">
                                                        </label>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بازگشت</button>
                                                        <button type="submit" class="btn btn-primary">ثبت</button>
                                                    </div>
                                                    </form>
                                                @endif
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="topic">
                            <div class="topic__content">
                                <div class="topic__info">
                                    <div class="topic__info-section">
                                        <div>
                                            <span class="topic__info-title">آخرین نظر:</span>
                                            @if(is_null($post->lastComment))
                                                <div  class="topic__info-avatar">
                                                    <a href="#" class="avatar"><img src="{{ env('USER_PROFILE') . $post->lastComment->first()->user->avatar }}" alt="avatar"></a>
                                                    <span>{{ $post->lastComment->first()->user->username }}</span>
                                                </div>
                                            @else
                                                اولین نفر شما باشید.
                                            @endif
                                        </div>
                                    </div>
                                    <div class="topic__info-section">
                                        <div>
                                            <span class="topic__info-title">نظرات:</span>
                                            <div  class="topic__info-count">{{ $post->comments->count() }}</div>
                                        </div>
                                        <div>
                                            <span class="topic__info-title">بازدید ها:</span>
                                            <div  class="topic__info-count">{{ views($post)->unique()->count() }}</div>
                                        </div>
                                        <div>
                                            <span class="topic__info-title">بازخورد ها:</span>
                                            <div  class="topic__info-count">{{ $post->reactions->count() }}</div>
                                        </div>
                                    </div>
                                    <a href="#" class="topic__info-more"><i class="icon-Arrow_Down"></i></a>
                                </div>
                                <div class="topic__title">
                                    <p>مرتبط با: "{{ $post->title }}"</p>
                                </div>
                                <div class="topic__posters">
                                    @foreach($related as $post)
                                        <a href="{{ route('home.posts.show', ['post' => $post->slug]) }}" class="avatar"><span>{{ $post->title }}</span></a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        @include('home.sections.comments' , ['comments' => $post->comments->where('reply_of', 0)])
                    </div>
                    <div class="topics__calendar">
                        <div class="calendar">
                            <div class="calendar__top">
                                <a href="#" class="calendar__btn calendar__btn--c-01"><i class="icon-Calender"></i></a>
                            </div>
                            <div class="calendar__center">
                                <div class="calendar__first">{{ $post->created_at->diffForHumans() }}</div>
                                <div class="calendar__range">
                                    <div class="calendar__current">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="topics__title">پست های پیشنهادی</div>
            </div>
            <div class="posts text-right" style="direction: rtl">
                <div class="posts__head">
                    <div class="posts__topic">موضوع</div>
                    <div class="posts__category">دسته بندی</div>
                    <div class="posts__users">کاربران فعال</div>
                    <div class="posts__replies">نظرات</div>
                    <div class="posts__views">بازدیدها</div>
                    <div class="posts__activity">آخرین فعالیت</div>
                </div>
                @foreach($popularPosts as $popularPost)
                    <div class="posts__item bg-f2f4f6">
                        <div class="posts__section-left">
                            <div class="posts__topic">
                                <div class="posts__content">
                                    <a href="{{ route('home.posts.show', ['post' => $popularPost->slug]) }}">
                                        <h3>{{ $popularPost->title }}</h3>
                                    </a>
                                    <div class="posts__tags tags">
                                        @foreach($popularPost->tags as $tag)
                                            <a href="#" class="bg-4f80b0">{{ $tag->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="posts__category"><a href="#" class="category"><i class="bg-4436f8"></i>{{ $popularPost->category->title }}</a></div>
                        </div>
                        <div class="posts__section-right">
                            <div class="posts__users">
                                @foreach($popularPost->activeUsers as $comment)
                                    <div>
                                        <a href="#" class="avatar"><img src="{{ env('USER_PROFILE') . $comment->user->avatar }}" alt="{{ $comment->user->username . '-avatar'}}"></a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="posts__replies">{{ $post->comments->count() }}</div>
                            <div class="posts__views">{{ views($post)->unique()->count() }}</div>
                            <div class="posts__activity">{{ $popularPost->updated_at->diffForHumans() }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
@section('scripts')
    <script>
        $('.replyBtn').on('click', function (){
            $('#replyOf').val($(this).data('id'))
        })
    </script>
@endsection
