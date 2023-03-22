<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutFaq;
use Illuminate\Http\Request;

class AboutFaqController extends Controller
{
    public function index() {
        $aboutFaqs = AboutFaq::orderBy('id', 'ASC')->get();

        return view('admin.about_us.about_faq.all', compact('aboutFaqs'));
    }

    public function add() {
        return view('admin.about_us.about_faq.add');
    }

    public function addPost(Request $request) {
        $request->validate([
            'question' => 'required|max:200',
            'answer' => 'required',
            'status' => 'required'
        ]);


        $aboutFaq = new AboutFaq();
        $aboutFaq->question = $request->question;
        $aboutFaq->answer = $request->answer;
        $aboutFaq->status = $request->status;
        $aboutFaq->save();

        return redirect()->route('about_faq')->with('message', 'About FAQ add successfully.');
    }

    public function edit($id){
        $AboutFaq = AboutFaq::where('id', $id)->first();
        return view('admin.about_us.about_faq.edit', compact('AboutFaq'));
    }

}
