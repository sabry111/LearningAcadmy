<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.auth.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.auth.category.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:191',
        ]);

        Category::create($data);
        return redirect(route('admin.category'));
    }
    public function edit($id)
    {
        $data['category'] = Category::findorfail($id);
        return view('admin.auth.category.edit')->with($data);
    }
    public function update(Request $request)
    {

        $category = Category::where('id', $request->id);
        $category->update(['name' => $request->name]);

        return redirect(route('admin.category'));
    }
    public function delete(Request $request)
    {

        $category = Category::where('id', $request->id);
        $category->delete();

        return redirect(route('admin.category'));
    }
}
