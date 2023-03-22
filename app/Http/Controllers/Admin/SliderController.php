<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use File;

class SliderController extends Controller
{
    public function index() {

        $sliders = Slider::orderBy('sort')->get();

        return view('admin.slider.all', compact('sliders'));
    }

    public function add() {
        $maxSort = Slider::max('sort') + 1;
        return view('admin.slider.add',compact('maxSort'));
    }

    public function addPost(Request $request) {

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|max:500',
            'link' => 'required',
            'sort' => 'required|integer|min:1',
            'image' => 'required|mimes:jpg,png,jpeg',
            'status' => 'required',
        ]);
        // Upload Video
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/slider';
        $file->move($destinationPath, $filename);

        $path = 'uploads/slider/'.$filename;

        $slider = new Slider();
        $slider->image = $path;
        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->short_description = $request->short_description;
        $slider->sort = $request->sort;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('slider')->with('message', 'Slider add successfully.');
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function editPost(Slider $slider, Request $request) {

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|max:500',
            'link' => 'required',
            'sort' => 'required|integer|min:1',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'status' => 'required',
        ]);
        if ($request->file('image')) {
            // Previous Video
            if(File::exists(public_path($slider->image))){
                File::delete(public_path($slider->image));
            }

            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/slider';
            $file->move($destinationPath, $filename);

            $path = 'uploads/slider/'.$filename;
            $slider->image = $path;
        }


        $slider->title = $request->title;
        $slider->link = $request->link;
        $slider->short_description = $request->short_description;
        $slider->sort = $request->sort;
        $slider->status = $request->status;
        $slider->save();

        return redirect()->route('slider')->with('message', 'Slider edit successfully.');
    }
}
