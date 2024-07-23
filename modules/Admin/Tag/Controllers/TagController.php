<?php

namespace Modules\Admin\Tag\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::latest()->paginate();
        return view('Tag::Views/index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Tag::Views/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:27'
        ]);

        Tag::create([
            'title' => $request->title
        ]);

        toastr()->success('با موفقیت به برچسب ها اضافه شد');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('Tag::Views/show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('Tag::Views/edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'title' => 'required|min:3|max:27'
        ]);

        $tag->update([
            'title' => $request->title
        ]);

        toastr()->success('برچسب مورد نظر با موفقیت ویرایش شد!');
        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Tag::destroy($request->tag);

        toastr()->success('برچسب مورد نظر با موفقیت حذف شد!');
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $keyWord = request()->keyword;
        if (request()->has('keyword') && trim($keyWord) != ''){
            $tags = Tag::where('title', 'LIKE', '%'.trim($keyWord).'%')->latest()->paginate(10);
            return view('Tag::Views/index' , compact('tags'));
        }else{
            $tags = Tag::latest()->paginate(10);
            return view('Tag::Views/index' , compact('tags'));
        }
    }
}
