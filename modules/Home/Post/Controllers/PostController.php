<?php

namespace Modules\Home\Post\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\post;
use App\Models\PostReaction;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function create()
    {
        $categories = Category::where('is_active', '1')->get();
        $tags = Tag::all();
        return view('Post::Views/create-post', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:75',
            'category_id' => 'required|numeric',
            'tag_ids' => 'required',
            'tag_ids.*' => 'required',
            'description' => 'required|string'
        ]);


        try {
            DB::beginTransaction();

            $post = Post::create([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'description' => $request->description,
                'user_id' => auth()->id(),
                'close_friends' => $request->canSeeFriends ? '1' : '0'
            ]);

            $post->tags()->attach($request->tag_ids);

            DB::commit();
        }catch (\Exception $ex) {
            DB::rollBack();
            toastr()->error('مشکلی پیش آمد!',$ex->getMessage());
            return redirect()->back();
        }

        toastr()->info('مطلب شما در دست بررسی قرار گرفت.');
        return redirect()->back();
    }

    public function show(post $post)
    {
        $categories = Category::where('is_active', '1')->get();
        $tags = Tag::all();
        $related = Post::whereHas('tags', function ($q) use ($post) {
            return $q->whereIn('title', $post->tags->pluck('title'));
        })
            ->where('id', '!=', $post->id)
            ->get();
        views($post)->cooldown($minutes = 1)->record();
        $popularPosts = Post::
            whereHas('comments')
            ->withCount('comments')
            ->where('created_at', '>', Carbon::now()->subWeek())
            ->orderBy('comments_count', 'DESC')
            ->take(5)
            ->get();
        return view('Post::Views/show-post', compact('post', 'categories', 'tags', 'related', 'popularPosts'));
    }

    public function storeReaction(Request $request, Post $post)
    {
        if (auth()->check() && in_array($request->reaction, [1, 2, 3])){
            if ($post->reactions()->where( 'user_id', auth()->id())->exists()){
                $oldReaction = PostReaction::where('user_id', auth()->id())->where('post_id', $post->id)->first();
                if ($oldReaction->reaction_id == $request->reaction){
                    PostReaction::where('user_id', auth()->id())->where('post_id', $post->id)->delete();
                    toastr()->info('ریکشن شما با موفقیت حذف شد');
                }else {
                    PostReaction::where('user_id', auth()->id())->where('post_id', $post->id)->delete();
                    PostReaction::create([
                        'reaction_id' => $request->reaction,
                        'user_id' => auth()->id(),
                        'post_id' => $post->id,
                    ]);
                    toastr()->info('ریکشن شما با موفقیت تغییر کرد');
                }
            }else{
                PostReaction::create([
                    'reaction_id' => $request->reaction,
                    'user_id' => auth()->id(),
                    'post_id' => $post->id,
                ]);
                toastr()->success('ریکشن شما با موفقیت ثبت شد');
            }
            return redirect()->back();
        }else{
            toastr()->error('لطفا اول وارد شوید و اگر مشکل حل نشد با پشتیبانی تماس بگیرید.');
            return redirect()->back();
        }
    }

}
