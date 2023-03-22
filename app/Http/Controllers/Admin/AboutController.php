<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AboutUs;
use File;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function index() {

        $about = AboutUs::where('id',1)->first();
        return view('admin.about_us.all', compact('about'));
    }

    public function edit(AboutUs $about) {
        return view('admin.about_us.edit', compact('about'));
    }

    public function editPost(AboutUs $about, Request $request)
    {
        $request->validate([
            'short_description' => 'required|max:200',
            'description' => 'required',
        ]);

        if ($request->file('image')) {
            // Previous Image
            if (File::exists(public_path($about->thumbs))) {
                File::delete(public_path($about->thumbs));
            }
            if (File::exists(public_path($about->full_image))) {
                File::delete(public_path($about->full_image));
            }

            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/about';
            $file->move($destinationPath, $filename);

            $fullPath = 'uploads/about/' . $filename;
            $about->full_image = $fullPath;

            // Thumbs
            $img = Image::make($destinationPath . '/' . $filename);
            $img->resize(650, 360);
            $img->save(public_path('uploads/about/thumbs/' . $filename), 50);
            $thumbsPath = 'uploads/about/thumbs/' . $filename;
            $about->thumbs = $thumbsPath;
        }

        if ($request->description != $about->description){
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
                    $image_name= "/uploads/about/" . time().$item.'.png';
                    $path = public_path() . $image_name;
                    file_put_contents($path, $imgeData);

                    $image->removeAttribute('src');
                    $image->setAttribute('src', asset($image_name));
                }

            }

            $about->description = $content = $dom->saveHTML();
        }

        $about->short_description = $request->short_description;
        $about->save();

        return redirect()->route('about')->with('message', 'AboutUs edit successfully.');
    }
}
