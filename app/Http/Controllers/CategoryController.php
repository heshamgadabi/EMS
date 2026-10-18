<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $data = [
            
            'categories' => $categories,
            'active_page' => 'category_list'
        ];
        
        return view('admin.category.index', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'type' => 'create'
        ];
        return view('admin.category.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
            
        ]);

        $category = new Category();
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('category.index')->with('success', $category->name . ' Category created successfully.');

        //
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
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        $data = [
            'category' => $category,
            'type' => 'edit'
        ];

        return view('admin.category.create', $data);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required',
            
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->status = $request->input('status');
        $category->description = $request->input('description');
        $category->save();

        return redirect()->route('category.index')->with('success', $category->name . ' Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();    

        return redirect()->route('category.index')->with('success', $category->name . ' Category deleted successfully.');
        //
    }
}
