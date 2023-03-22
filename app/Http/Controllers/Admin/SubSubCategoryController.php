<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SubSubCategoryFaq;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use File;

class SubSubCategoryController extends Controller
{
    public function index(Request $request) {

        $query = SubSubCategory::query();
            if ($request->category)
                $query->where('category_id',$request->category);

        if ($request->sub_category)
            $query->where('sub_category_id',$request->sub_category);


        $subSubCategories = $query->orderBY('sort')->get();

        $categories = Category::orderBy('sort')->get();

        return view('admin.sub_sub_category.all', compact('subSubCategories',
        'categories'));
    }

    public function add() {
        $categories = Category::orderBy('sort')->get();
        $maxSort = SubSubCategory::count() + 1;
        return view('admin.sub_sub_category.add', compact('categories','maxSort'));
    }

    public function addPost(Request $request) {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'name' => [
                'required','max:255',
                Rule::unique('sub_sub_categories')
                    ->where('name', $request->name)
                    ->where('category_id', $request->category)
                    ->where('sub_category_id', $request->sub_category)
            ],
            'short_description' => 'required|max:200',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg',
            'sort' => 'required|integer|min:1',
            'status' => 'required'
        ]);

          // Upload Video
          $file = $request->file('image');
          $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
          $destinationPath = 'public/uploads/subsubcategory';
          $file->move($destinationPath, $filename);

          $fullPath = 'uploads/subsubcategory/'.$filename;
          // Thumbs
          $img = Image::make($destinationPath.'/'.$filename);
          $img->resize(650, 360);
          $img->save(public_path('uploads/subsubcategory/thumbs/'.$filename), 50);
          $thumbsPath = 'uploads/subsubcategory/thumbs/'.$filename;



          //text Editor to save image
          $dom = new \DomDocument();
          $dom->loadHtml($request->description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
          $imageFile = $dom->getElementsByTagName('img');

          foreach($imageFile as $item => $image){
              $data = $image->getAttribute('src');
              list($type, $data) = explode(';', $data);
              list(, $data)      = explode(',', $data);
              $imgeData = base64_decode($data);
              $image_name= "/uploads/subsubcategory/" . time().$item.'.png';
              $path = public_path() . $image_name;
              file_put_contents($path, $imgeData);

              $image->removeAttribute('src');
              $image->setAttribute('src', asset($image_name));
          }

          $content = $dom->saveHTML();


        $subSubCategory = new SubSubCategory();
        $subSubCategory->category_id = $request->category;
        $subSubCategory->sub_category_id = $request->sub_category;
        $subSubCategory->name = $request->name;
        $subSubCategory->slug = preg_replace('/\s+/u', '-', trim(strtolower(Category::find($request->category)->name).' '.strtolower(SubCategory::find($request->sub_category)->name).' '.strtolower($request->name)));
        $subSubCategory->short_description = $request->short_description;
        $subSubCategory->description = $content;
        $subSubCategory->full_image = $fullPath;
        $subSubCategory->thumbs = $thumbsPath;
        $subSubCategory->sort = $request->sort;
        $subSubCategory->status = $request->status;
        $subSubCategory->save();

        return redirect()->route('sub_sub_category')->with('message', 'Sub Sub Category add successfully.');
    }

    public function edit(SubSubCategory $subSubCategory) {
        $categories = Category::orderBy('sort')->get();
        return view('admin.sub_sub_category.edit', compact('subSubCategory', 'categories'));
    }

    public function editPost(SubSubCategory $subSubCategory, Request $request) {
        $request->validate([
            'category' => 'required',
            'sub_category' => 'required',
            'name' => [
                'required','max:255',
                Rule::unique('sub_sub_categories')
                    ->ignore($subSubCategory)
                    ->where('name', $request->name)
                    ->where('category_id', $request->category)
                    ->where('sub_category_id', $request->sub_category)
            ],
            'sort' => 'required|integer|min:1',
            'description' => 'required',
            'short_description' => 'required|max:200',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'status' => 'required'
        ]);

        if ($request->file('image')) {
            // Previous Image
            if (File::exists(public_path($subSubCategory->thumbs))) {
                File::delete(public_path($subSubCategory->thumbs));
            }
            if (File::exists(public_path($subSubCategory->full_image))) {
                File::delete(public_path($subSubCategory->full_image));
            }

            // Upload Image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString() . '.' . $file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/subsubcategory';
            $file->move($destinationPath, $filename);

            $fullPath = 'uploads/subsubcategory/' . $filename;
            $subSubCategory->full_image = $fullPath;

            // Thumbs
            $img = Image::make($destinationPath . '/' . $filename);
            $img->resize(650, 360);
            $img->save(public_path('uploads/subsubcategory/thumbs/' . $filename), 50);
            $thumbsPath = 'uploads/subsubcategory/thumbs/' . $filename;
            $subSubCategory->thumbs = $thumbsPath;
        }

        if ($request->description != $subSubCategory->description){
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
                            $image_name= "/uploads/subSubCategory/" . time().$item.'.png';
                            $path = public_path() . $image_name;
                            file_put_contents($path, $imgeData);

                            $image->removeAttribute('src');
                            $image->setAttribute('src', asset($image_name));
                        }

                    }

                    $subSubCategory->description = $content = $dom->saveHTML();
                }

        $subSubCategory->category_id = $request->category;
        $subSubCategory->sub_category_id = $request->sub_category;
        $subSubCategory->name = $request->name;
        $subSubCategory->sort = $request->sort;
        $subSubCategory->short_description = $request->short_description;
        $subSubCategory->status = $request->status;
        $subSubCategory->slug = preg_replace('/\s+/u', '-', trim(strtolower(Category::find($request->category)->name).' '.strtolower(SubCategory::find($request->sub_category)->name).' '.strtolower($request->name)));
        $subSubCategory->save();

        return redirect()->route('sub_sub_category')->with('message', 'Sub Sub Category edit successfully.');
    }

    public function getSubCategory(Request $request) {
        $subCategories = SubCategory::where('category_id', $request->categoryId)
            ->orderBy('sort')
            ->get()->toArray();
        return response()->json($subCategories);
    }
    public function getSubSubCategory(Request $request) {
        $subSubCategories = SubSubCategory::where('sub_category_id', $request->subCategoryId)
            ->orderBy('sort')
            ->get()->toArray();
        return response()->json($subSubCategories);
    }

    public function faqAll( $subSubCategory) {
        $subCategoriesFaqs = SubSubCategoryFaq::where('sub_sub_category_id', $subSubCategory)->get();
        return view('admin.sub_sub_category.faqall',compact('subCategoriesFaqs','subSubCategory'));
    }

    public function faqadd() {
        $maxSort = SubSubCategoryFaq::count() + 1;
        return view('admin.sub_sub_category.faqadd',compact('maxSort'));
    }

    public function faqAddPost($subSubCategory, Request $request) {
        $request->validate([
            'question' => 'required|max:200',
            'answer' => 'required',
            'sort' => 'required|integer|min:1',
            'status' => 'required'
        ]);


        $subSubCategoryfaq = new SubSubCategoryFaq();
        $subSubCategoryfaq->sub_sub_category_id = $subSubCategory;
        $subSubCategoryfaq->question = $request->question;
        $subSubCategoryfaq->answer = $request->answer;
        $subSubCategoryfaq->sort = $request->sort;
        $subSubCategoryfaq->status = $request->status;
        $subSubCategoryfaq->save();

        return redirect()->route('sub_sub_category_faq',['subSubCategory'=>$subSubCategoryfaq->sub_sub_category_id])->with('message', 'FAQ add successfully.');
    }

    public function faqEdit(SubSubCategoryFaq $subSubCategoryfaq) {
        // dd($subSubCategoryfaq);
        return view('admin.sub_sub_category.faqedit',compact('subSubCategoryfaq'));
    }

    public function faqEditPost(SubSubCategoryFaq $subSubCategoryfaq, Request $request) {
        $request->validate([
            'question' => 'required|max:200',
            'answer' => 'required',
            'sort' => 'required|integer|min:1',
            'status' => 'required'
        ]);


        $subSubCategoryfaq->sub_sub_category_id = $subSubCategoryfaq->sub_sub_category_id;
        $subSubCategoryfaq->question = $request->question;
        $subSubCategoryfaq->answer = $request->answer;
        $subSubCategoryfaq->sort = $request->sort;
        $subSubCategoryfaq->status = $request->status;
        $subSubCategoryfaq->save();


        return redirect()->route('sub_sub_category_faq',['subSubCategory'=>$subSubCategoryfaq->sub_sub_category_id])->with('message', 'Sub Sub CategoryFaq edit successfully.');
    }


}
