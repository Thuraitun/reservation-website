<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('Admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name' => $request->name,
            'gust_number' => $request->gust_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.tables.index')->with('success', 'Table created successfully.');
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
    public function edit(Table $table)
    {
        return view('Admin.tables.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TableStoreRequest $request, Table $table)
    {
        $table->update($request->validated());

        return redirect()->route('admin.tables.index')->with('success', 'Table updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Table $table)
    {
        $table->delete();

        return back()->with('danger', 'Table deleted successfully.');
    }
}
