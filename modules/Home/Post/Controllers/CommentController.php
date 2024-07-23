<?php

namespace Modules\Home\Post\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CommentReaction;
use App\Models\post;
use App\Models\Reaction;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{

    public function store(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            "text" => "required|min:3"
        ]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        if (auth()->check()){
            try {
                DB::beginTransaction();

                Comment::create([
                    'user_id' => auth()->id(),
                    'post_id' => $post->id,
                    'text' => $request->text,
                    'reply_of' => $request->replyOf
                ]);

                DB::commit();
                toastr()->success('نظر شما با موفقیت ثبت و در انتظار تایید است!');
                return redirect()->back();
            }catch (\Exception $ex){
                DB::rollBack();
                toastr()->warning( $ex->getMessage() .'مشکلی پیش آمد!');
                return redirect()->back();
            }
        }else{
            toastr()->warning('جهت ثبت نظر ابتدا ثبت نام کنید.');
            return redirect()->back();
        }
    }

    public function storeReaction(Request $request, Comment $comment)
    {
        if (auth()->check() && in_array($request->reaction, [1, 2, 3])){
            if ($comment->reactions()->where('user_id', auth()->id())->where('comment_id', $comment->id)->exists()){
                $oldReaction = CommentReaction::where('user_id', auth()->id())->where('comment_id', $comment->id)->first();
                if ($oldReaction->reaction_id == $request->reaction){
                    CommentReaction::where('user_id', auth()->id())->where('comment_id', $comment->id)->delete();
                    toastr()->info('ریکشن شما با موفقیت حذف شد');
                }else {
                    CommentReaction::where('user_id', auth()->id())->where('comment_id', $comment->id)->delete();
                    CommentReaction::create([
                        'reaction_id' => $request->reaction,
                        'user_id' => auth()->id(),
                        'comment_id' => $comment->id,
                    ]);
                    toastr()->info('ریکشن شما با موفقیت تغییر کرد');
                }
            }else{
                CommentReaction::where('user_id', auth()->id())->where('comment_id', $comment->id)->delete();
                CommentReaction::create([
                    'reaction_id' => $request->reaction,
                    'user_id' => auth()->id(),
                    'comment_id' => $comment->id,
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
