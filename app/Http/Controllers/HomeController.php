<?php

namespace App\Http\Controllers;

use App\Models\Admin\SubSubCategoryFaq;
use App\Models\BloodRequest;
use App\Models\District;
use App\Models\Division;
use App\Models\Faq;
use App\Models\Slider;
use App\Models\Story;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Upazila;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserPost;
use App\Notifications\BloodRequestNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Slider::where('status',1)
            ->orderBy('sort')
            ->get();
        $userDetails = UserDetail::orderBy('id', 'desc')->take(8)->get();
        $users_count = UserDetail::count();
        $ABPositiveCount = UserDetail::where('blood_group', "AB+")->count();
        $ABNegativeCount = UserDetail::where('blood_group', "AB-")->count();
        $APositiveCount = UserDetail::where('blood_group', "A+")->count();
        $ANegativeCount = UserDetail::where('blood_group', "A-")->count();
        $OPositiveCount= UserDetail::where('blood_group', "O+")->count();
        $ONegativeCount = UserDetail::where('blood_group', "O-")->count();
        $BPositiveCount = UserDetail::where('blood_group', "B+")->count();
        $BNegativeCount = UserDetail::where('blood_group', "B-")->count();

        return view('frontend.home',compact('sliders','userDetails','users_count','ABPositiveCount',
            'ABNegativeCount','APositiveCount','ANegativeCount','OPositiveCount','ONegativeCount','BPositiveCount','BNegativeCount'));
   }

    public function stories()
    {
        $stories = Story::where('status',1)
            ->latest()->get();

        return view('frontend.story',compact('stories'));
   }
    public function storiesDetails($slug)
    {

        $story = Story::where('slug',$slug)->first();

        if (!$story)
            abort('404');

        return view('frontend.stories_details',compact('story'));
   }
    public function SubDetails($slug)
    {

        $subCategory = SubCategory::where('slug',$slug)->first();

        return view('frontend.sub_category_details',compact('subCategory'));
   }
    public function SubSubDetails($slug)
    {

        $subSubCategory = SubSubCategory::where('slug',$slug)->first();

        $SubSubCategoryFaqs = SubSubCategoryFaq::where('sub_sub_category_id', $subSubCategory->id)->get();

        if (!$subSubCategory)
            abort('404');
         return view('frontend.sub_sub_details',compact('subSubCategory','SubSubCategoryFaqs'));
   }


    public function requestConfirmation(){
        return view('frontend.profile.request_details');
    }

    public function donorList(Request $request){
       if ($request->search != ''){

           $getDistricts = District::where('name','like','%'.$request->search.'%')
                                ->get()->pluck('id');
           $districtsId = [];
           if (count($getDistricts) > 0){
               $districtsId = $getDistricts->toArray();
           }

           $getThanas = Upazila::where('name','like','%'.$request->search.'%')
                                ->get()->pluck('id');
           $getThanaId = [];

           if (count($getThanas) > 0){
               $getThanaId = $getThanas->toArray();
           }

           $userDetails = UserDetail::orderBy('id', 'desc')
               ->where('blood_group','like','%'.$request->search.'%')
               ->orWhere('age','like','%'.$request->search.'%')
               ->orWhereIn('district_id',$districtsId)
               ->orWhereIn('thana_id',$getThanaId)
               ->get();
       }else{
           $userDetails = UserDetail::orderBy('id', 'desc')->get();
       }

        return view('frontend.profile.all_donor_list',compact('userDetails'));
    }

    public function myProfile($id){
        $userdetails = UserDetail::where('user_id',$id)->first();
        return view('frontend.profile.my_profile',compact('userdetails'));
    }

    public function requestToAll(){
        if(Auth::check()) {
            $divisions = Division::orderBy('id', 'asc')->get();
           return view('frontend.profile.request_to_all_donor', compact('divisions'));
        }else{
            return redirect()->route('login_home');
        }
    }

    //Notification

    public function requestToAllPost(Request $request){

        if($request->blood_for == 1){
            $request->validate([
                'blood_for' => 'required',
                'division' => 'required',
                'date_blood_needed' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
                'image' => 'nullable',
                'about_patient' => 'nullable',
            ]);
        }else{
            $request->validate([
                'blood_for' => 'required',
                'division' => 'required',
                'blood_group' => 'required',
                'patient_name' => 'required',
                'date_blood_needed' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
                'image' => 'nullable',
                'about_patient' => 'nullable',
            ]);
        }

        if($request->file('image')){
            // Upload image
            $file = $request->file('image');
            $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
            $destinationPath = 'public/uploads/patientphoto';
            $file->move($destinationPath, $filename);

            $path = 'uploads/patientphoto/'.$filename;
        }

        if($request->blood_for == 1){
            if(($request->division != '') && ($request->district == '') && ($request->thana=='')){
                $userDetails = UserDetail::where('division_id',$request->division)
                    ->Where('blood_group',auth()->user()->blood_group)
                    ->get();
            }elseif(($request->division != '') && ($request->district != '') && ($request->thana=='')){
                $userDetails = UserDetail::where('district_id',$request->district)
                    ->Where('blood_group',auth()->user()->blood_group)
                    ->get();
            }else{
                $userDetails = UserDetail::where('thana_id',$request->thana)
                    ->Where('blood_group',auth()->user()->blood_group)
                    ->get();
            }
        }else{
            if(($request->division != '') && ($request->district == '') && ($request->thana=='')){
                $userDetails = UserDetail::where('division_id',$request->division)
                    ->where('blood_group',$request->blood_group)
                    ->get();
            }elseif(($request->division != '') && ($request->district != '') && ($request->thana=='')){
                $userDetails = UserDetail::where('district_id',$request->district)
                    ->where('blood_group',$request->blood_group)
                    ->get();
            }else{
                $userDetails = UserDetail::where('thana_id',$request->thana)
                    ->where('blood_group',$request->blood_group)
                    ->get();

            }
        }


        $bloodRequest = new BloodRequest();
        $bloodRequest->taker_id= auth()->user()->id;
        $bloodRequest->date= $request->date_blood_needed;
        $bloodRequest->blood_group= $request->blood_group ?? auth()->user()->blood_group;
        $bloodRequest->address= $request->address;
        $bloodRequest->contact_number= $request->contact_number;
        $bloodRequest->patient_name= $request->patient_name ?? auth()->user()->id;
        $bloodRequest->confirmation_status= 2;
        $bloodRequest->division_id= $request->division;
        $bloodRequest->district_id= $request->district;
        $bloodRequest->thana_id= $request->thana;
        $bloodRequest->image= $path ?? null;
        $bloodRequest->about_patient= $request->about_patient ?? null;
        $bloodRequest->save();

        $count = 0;
        foreach ($userDetails as $reqProduct) {
            $users = User::where('id', $userDetails[$count]->user_id)->get();
            $requestDetails = [
                'title' => 'Emergency Blood Needed',
                'text' => 'Request by '.auth()->user()->name.' at '.$request->address,
                'link' => route('notification_detail',['bloodRequest'=>$bloodRequest->id]),
            ];

            Notification::send($users, new BloodRequestNotification($requestDetails));
            $count++;
        }

        return redirect()->route('request_confirmation')
            ->with('message','Request sent successfully.');
    }
}
