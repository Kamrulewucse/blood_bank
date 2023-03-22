<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use File;

class StoryController extends Controller
{
    public function index() {

        $stories = Story::latest()->get();

        return view('admin.story.all', compact('stories'));
    }

    public function add() {
        return view('admin.story.add');
    }

    public function addPost(Request $request) {


        $request->validate([
            'title' => 'required|string|max:255|unique:stories',
            'short_description' => 'required|max:200',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'status' => 'required',
        ]);
        // Upload Video
        $file = $request->file('image');
        $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
        $destinationPath = 'public/uploads/story';
        $file->move($destinationPath, $filename);

        $fullPath = 'uploads/story/'.$filename;
        // Thumbs
        $img = Image::make($destinationPath.'/'.$filename);
        $img->resize(650, 360);
        $img->save(public_path('uploads/story/thumbs/'.$filename), 50);
        $thumbsPath = 'uploads/story/thumbs/'.$filename;



        //text Editor to save image
        $dom = new \DomDocument();
        $dom->loadHtml($request->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach($imageFile as $item => $image){
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name= "/uploads/story/" . time().$item.'.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', asset($image_name));
        }

        $content = $dom->saveHTML();

        $story = new Story();
        $story->slug = preg_replace('/\s+/u', '-', trim(strtolower($request->title)));
        $story->thumbs = $thumbsPath;
        $story->full_image = $fullPath;
        $story->title = $request->title;
        $story->description = $content;
        $story->short_description = $request->short_description;
        $story->status = $request->status;
        $story->save();

        return redirect()->route('story')->with('message', 'Story add successfully.');
    }

    public function edit(Story $story) {
        return view('admin.story.edit', compact('story'));
    }

    public function editPost(Story $story, Request $request)
    {

        $request->validate([
            'title' => [
                'required', 'max:255',
                Rule::unique('stories')
                    ->where('title', $request->title)
                    ->ignore($story)
            ],
            'description' => 'required',
            'short_description' => 'required|max:200',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'status' => 'required',
        ]);
        if ($request->file('image')) {
            // Previous Image
            if (File::exists(public_path($story->thumbs))) {
                File::delete(public_path($story->thumbs));
            }
            if (File::exists(public_path($story->full_image))) {
                File::delete(public_path($story->full_image));
            }

            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/story';
            $file->move($destinationPath, $filename);

            $fullPath = 'uploads/story/' . $filename;
            $story->full_image = $fullPath;

            // Thumbs
            $img = Image::make($destinationPath . '/' . $filename);
            $img->resize(650, 360);
            $img->save(public_path('uploads/story/thumbs/' . $filename), 50);
            $thumbsPath = 'uploads/story/thumbs/' . $filename;
            $story->thumbs = $thumbsPath;
        }

        if ($request->description != $story->description){
    //text Editor to save image
            $dom = new \DomDocument();
            @$dom->loadHtml($request->description,true);
            $imageFile = $dom->getElementsByTagName('img');

            foreach($imageFile as $item => $image){
                $data = $image->getAttribute('src');

                if(!getimagesize($data)){
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $imgeData = base64_decode($data);
                    $image_name= "/uploads/story/" . time().$item.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imgeData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', asset($image_name));
                }

            }

            $story->description = $content = $dom->saveHTML();
        }


        $story->slug = preg_replace('/\s+/u', '-', trim(strtolower($request->title)));
        $story->title = $request->title;
        $story->short_description = $request->short_description;
        $story->status = $request->status;
        $story->save();

        return redirect()->route('story')->with('message', 'Story edit successfully.');
    }
}
