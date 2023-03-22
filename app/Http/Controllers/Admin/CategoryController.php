<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use File;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::orderBy('sort')->get();

        return view('admin.category.all', compact('categories'));
    }

    public function add() {
        $maxSort = Category::max('sort') + 1;
        return view('admin.category.add',compact('maxSort'));
    }

    public function addPost(Request $request) {

        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'suffix_name' => 'nullable|max:255',
            'sort' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->suffix_name = $request->suffix_name;
        $category->slug = preg_replace('/\s+/u', '-', trim(strtolower($request->name)));
        $category->sort = $request->sort;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category')->with('message', 'Category add successfully.');
    }

    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }

    public function editPost(Category $category, Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'suffix_name' => 'nullable|string|max:255',
            'sort' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        $category->name = $request->name;
        $category->suffix_name = $request->suffix_name;
        $category->slug = preg_replace('/\s+/u', '-', trim(strtolower($request->name)));
        $category->sort = $request->sort;
        $category->status = $request->status;
        $category->save();

        return redirect()->route('category')->with('message', 'Category edit successfully.');
    }
}
