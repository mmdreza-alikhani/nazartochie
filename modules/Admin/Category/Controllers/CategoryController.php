<?php

namespace Modules\Admin\Category\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate();
        return view('Category::Views/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Category::Views/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:27',
            'is_active' => 'required',
            'icon' => 'nullable',
            'description' => 'nullable|min:3|max:50'
        ]);

        Category::create([
            'title' => $request->title,
            'is_active' => $request->is_active,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        toastr()->success('با موفقیت به دسته بندی ها اضافه شد');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('Category::Views/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Category::Views/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|min:3|max:27',
            'is_active' => 'required',
            'icon' => 'nullable',
            'description' => 'nullable|min:3|max:50'
        ]);

        $category->update([
            'title' => $request->title,
            'is_active' => $request->is_active,
            'description' => $request->description,
            'icon' => $request->icon,
        ]);

        toastr()->success('دسته بندی مورد نظر با موفقیت ویرایش شد!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
    }
}
