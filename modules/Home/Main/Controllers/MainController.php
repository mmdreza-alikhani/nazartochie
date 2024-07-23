<?php

namespace Modules\Home\Main\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index(){
        $categories = Category::where('is_active', '1')->get();
        $tags = Tag::all();
        $posts = Post::with('activeUsers', 'tags', 'category', 'comments', 'views')->get();
        return view('HomeMain::Views/index', compact('categories', 'tags', 'posts'));
    }

    public function sortBy(){
        $categories = Category::where('is_active', '1')->get();
        $tags = Tag::all();
        $posts = Post::with('activeUsers', 'tags', 'category', 'comments', 'views')->latest()->get();
        if(request()->state){
            $sortBy = request()->state;
            if ($sortBy == 'latest') {
                $posts = Post::with('activeUsers', 'tags', 'category', 'comments', 'views')->latest()->get();
            }elseif ($sortBy == 'unread') {
                $userId = auth()->id();
                $posts = Post::whereIn('id', $posts->pluck('id'))
                    ->whereDoesntHave('views', function ($query) use ($userId) {
                        $query->where('visitor', $userId);
                    })
                    ->latest()->get();
            }elseif ($sortBy == 'viral'){
                $posts = Post::withCount('reactions')->orderBy('reactions_count', 'desc')->with('activeUsers', 'tags', 'category', 'comments', 'views')->get();
            }elseif ($sortBy == 'following'){
                $posts = Post::with('activeUsers', 'tags', 'category', 'comments', 'views')->latest()->get();
            }
        }
        return view('HomeMain::Views/index', compact('categories', 'tags', 'posts'));
    }

}
