@foreach($comments as $comment)
<div class="topic">
    <div class="topic__head">
        <div class="topic__avatar">
            <a href="#" class="avatar"><img src="{{ env('USER_PROFILE') . $comment->user->avatar }}" alt="{{ $comment->user->username . '-Avatar' }}"></a>
        </div>
        <div class="topic__caption" style="margin-right: 5px">
            <div class="topic__name">
                <a href="#">{{ $comment->user->username }}</a>
            </div>
            <div class="topic__date"><i class="icon-Watch_Later"></i>{{ $comment->created_at->diffForHumans() }}</div>
        </div>
    </div>
    <div class="topic__content">
        <div class="topic__text">
            <p>{{ $comment->text }}</p>
        </div>
        <div class="topic__footer">
            <div class="topic__footer-likes">
                <div>
                    <span>{{ $comment->reactions("1")->count() }}</span>
                    <a href="{{ route('home.posts.comments.storeReaction', ['comment' => $comment, 'reaction' => '1']) }}"><i class="icon-Upvote"></i></a>
                </div>
                <div>
                    <span>{{ $comment->reactions("2")->count() }}</span>
                    <a href="{{ route('home.posts.comments.storeReaction', ['comment' => $comment, 'reaction' => '2']) }}"><i class="icon-Downvote"></i></a>
                </div>
                <div>
                    <span>{{ $comment->reactions("3")->count() }}</span>
                    <a href="{{ route('home.posts.comments.storeReaction', ['comment' => $comment, 'reaction' => '3']) }}"><i class="icon-Favorite_Topic"></i></a>
                </div>
                <div style="margin-right: 20px">
                    <span>{{ $comment->replies->count() }}</span>
                    <a class="replyBtn" data-toggle="modal" data-target="#exampleModal" data-id="{{ $comment->id }}" href="{{ \Illuminate\Support\Facades\Request::url() . '#addComment' }}"><i class="icon-Reply_Empty"></i></a>
                </div>
            </div>
        </div>
    </div>
    @include('home.sections.comments' , ['comments' => $comment->replies])
</div>
@endforeach
