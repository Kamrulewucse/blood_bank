<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Faq;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request) {

        $query = Faq::query();
            if ($request->category)
                $query->where('category_id',$request->category);

        if ($request->sub_category)
            $query->where('sub_category_id',$request->sub_category);

        if ($request->sub_sub_category)
            $query->where('sub_category_id',$request->sub_sub_category);


        $faqs = $query->orderBY('id')->get();

        $categories = Category::orderBy('sort')->get();

        return view('admin.faq.all', compact('faqs',
        'categories'));
    }

    public function add() {
        $categories = Category::orderBy('sort')->get();
        return view('admin.faq.add',compact('categories'));
    }

    public function addPost(Request $request) {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'sub_sub_category' => 'required',
            'question' => 'required|max:200',
            'answer' => 'required',
            'status' => 'required'
        ]);


        $faq = new Faq();
        $faq->category_id = $request->category;
        $faq->sub_category_id = $request->sub_category;
        $faq->sub_sub_category_id = $request->sub_sub_category;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('faq')->with('message', 'FAQ add successfully.');
    }

    public function edit(Faq $faq) {
        $categories = Category::orderBy('sort')->get();
        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    public function editPost(Faq $faq, Request $request) {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'sub_sub_category' => 'required',
            'question' => 'required|max:200',
            'answer' => 'required',
            'status' => 'required'
        ]);


        $faq->category_id = $request->category;
        $faq->sub_category_id = $request->sub_category;
        $faq->sub_sub_category_id = $request->sub_sub_category;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('faq')->with('message', 'FAQ Edit successfully.');
    }

}
