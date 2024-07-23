<?php

namespace Modules\Admin\Post\Controllers;

use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;

class PostController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate();
        return view('Post::Views/index', compact('posts'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Post::Views/show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function not_qualified(Post $post)
    {
        return view('Post::Views/not_qualified', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function rejection(Request $request, Post $post)
    {
        $request->validate([
            'reason' => 'required'
        ]);
        $post->update([
            'rejection_by' => auth()->id(),
            'reason_for_rejection' => $request->reason,
            'status' => 0
        ]);
        toastr()->success('با موفقیت رد صلاحیت اضافه شد');
        return redirect()->route('admin.posts.index');
    }

}
