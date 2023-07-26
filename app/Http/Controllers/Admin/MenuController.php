<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('Admin.menus.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('Admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        $image = time().'.'.$request->image->extension();
        $request->image->storeAs('public/menus', $image);

        $menu =  Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image'=> $image,
        ]);

        if($request->has('categories'))
        {
            $menu->categories()->attach($request->categories);
        }

        return redirect()->route('admin.menus.index')->with('success', 'Menu created successfully.');
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
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('Admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'=> 'required',
            'description' => 'required',
            'price' => 'required',
        ]);
        $image = $request->image;

        if($request->hasFile('image')) {
            Storage::delete('public/menus/'. $menu->image);

            $image = time().'.'.$request->image->extension();
            $request->image->storeAs('public/menus', $image);
        };

        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $image,
            'price' => $request->price,
        ]);

        if($request->has('categories'))
        {
            $menu->categories()->sync($request->categories);
        }

        return redirect()->route('admin.menus.index')->with('success', 'Menu updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        // dd($menu);
        Storage::delete('public/menus/'. $menu->image);
        $menu->categories()->detach();
        $menu->delete();

        return redirect()->route('admin.menus.index')->with('danger', 'Menu deleted successfully.');
    }
}
