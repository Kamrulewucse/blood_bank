<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use File;

class SubCategoryController extends Controller
{
    public function index() {
        $subCategories = SubCategory::orderBy('sort')->get();
        return view('admin.sub_category.all', compact('subCategories'));
    }

    public function add() {
        $categories = Category::orderBy('sort')->get();
        $maxSort = SubCategory::max('sort') + 1;
        return view('admin.sub_category.add', compact('categories','maxSort'));
    }

    public function addPost(Request $request) {
        $request->validate([
            'category' => 'required',
            'name' => [
                'required','max:255',
                Rule::unique('sub_categories')
                    ->where('name', $request->name)
                    ->where('category_id', $request->category)
            ],
            'sort' => 'required|integer|min:1',
            'description' => 'required',
            'short_description' => 'required|max:200',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'status' => 'required'
        ]);

           // Upload Video
           $file = $request->file('image');
           $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
           $destinationPath = 'public/uploads/subcategory';
           $file->move($destinationPath, $filename);

           $fullPath = 'uploads/subsubcategory/'.$filename;
           // Thumbs
           $img = Image::make($destinationPath.'/'.$filename);
           $img->resize(650, 360);
           $img->save(public_path('uploads/subcategory/thumbs/'.$filename), 50);
           $thumbsPath = 'uploads/subcategory/thumbs/'.$filename;



           //text Editor to save image
           $dom = new \DomDocument();
           $dom->loadHtml($request->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
           $imageFile = $dom->getElementsByTagName('img');

           foreach($imageFile as $item => $image){
               $data = $image->getAttribute('src');
               list($type, $data) = explode(';', $data);
               list(, $data)      = explode(',', $data);
               $imgeData = base64_decode($data);
               $image_name= "/uploads/subcategory/" . time().$item.'.png';
               $path = public_path() . $image_name;
               file_put_contents($path, $imgeData);

               $image->removeAttribute('src');
               $image->setAttribute('src', asset($image_name));
           }

           $content = $dom->saveHTML();



        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = preg_replace('/\s+/u', '-', trim(strtolower(Category::find($request->category)->name).' '.strtolower($request->name)));
        $subCategory->short_description = $request->short_description;
        $subCategory->description = $content;
        $subCategory->full_image = $fullPath;
        $subCategory->thumbs = $thumbsPath;
        $subCategory->sort = $request->sort;
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect()->route('sub_category')->with('message', 'Sub Category add successfully.');
    }

    public function edit(SubCategory $subCategory) {
        $categories = Category::orderBy('sort')->get();
        return view('admin.sub_category.edit', compact('subCategory', 'categories'));
    }

    public function editPost(SubCategory $subCategory, Request $request) {
        $request->validate([
            'category' => 'required',
            'name' => [
                'required','max:255',
                Rule::unique('sub_categories')
                    ->ignore($subCategory)
                    ->where('name', $request->name)
                    ->where('category_id', $request->category)
            ],
            'sort' => 'required|integer|min:1',
            'description' => 'required',
            'short_description' => 'required|max:200',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'status' => 'required'
        ]);

        if ($request->file('image')) {
            // Previous Image
            if (File::exists(public_path($subCategory->thumbs))) {
                File::delete(public_path($subCategory->thumbs));
            }
            if (File::exists(public_path($subCategory->full_image))) {
                File::delete(public_path($subCategory->full_image));
            }

            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/subcategory';
            $file->move($destinationPath, $filename);

            $fullPath = 'uploads/subcategory/' . $filename;
            $subCategory->full_image = $fullPath;

            // Thumbs
            $img = Image::make($destinationPath . '/' . $filename);
            $img->resize(650, 360);
            $img->save(public_path('uploads/subcategory/thumbs/' . $filename), 50);
            $thumbsPath = 'uploads/subcategory/thumbs/' . $filename;
            $subCategory->thumbs = $thumbsPath;
        }

        if ($request->description != $subCategory->description){
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
                            $image_name= "/uploads/subcategory/" . time().$item.'.png';
                            $path = public_path() . $image_name;
                            file_put_contents($path, $imgeData);

                            $image->removeAttribute('src');
                            $image->setAttribute('src', asset($image_name));
                        }

                    }

                    $subCategory->description = $content = $dom->saveHTML();
                }

        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = preg_replace('/\s+/u', '-', trim(strtolower(Category::find($request->category)->name).' '.strtolower($request->name)));
        $subCategory->sort = $request->sort;
        $subCategory->short_description = $request->short_description;
        $subCategory->status = $request->status;
        $subCategory->save();

        return redirect()->route('sub_category')->with('message', 'Sub Category edit successfully.');
    }
}
