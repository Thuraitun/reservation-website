<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryStoreRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('Admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $image = time().'.'.$request->image->extension();
        $request->image->storeAs('public/categories', $image);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image'=> $image,
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('Admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
        ]);
        $image = $request->image;

        if($request->hasFile('image')) {
            Storage::delete('public/categories/'. $category->image);

            $image = time().'.'.$request->image->extension();
            $request->image->storeAs('public/categories', $image);
        };

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
        ]);

        return redirect()->route('admin.categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Storage::delete('public/categories/'. $category->image);
        $category->delete();

        return redirect()->route('admin.categories.index');
    }
}
