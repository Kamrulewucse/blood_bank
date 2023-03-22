<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Admin\AboutUs;
use App\Models\Admin\AboutFaq;
use App\Http\Controllers\Controller;
use App\Models\Story;

class AboutUsController extends Controller
{
    public function index(){
        $about = AboutUs::where('id',1)->first();
        $faqs = AboutFaq::orderBy('id', 'asc')->get();
        return view('frontend.about.about_us',compact('about', 'faqs'));
    }
    public function latestNews(){
        $stories = Story::orderBy('id', 'desc')->take(6)->get();
        return view('frontend.latest_news',compact('stories'));
    }


}
