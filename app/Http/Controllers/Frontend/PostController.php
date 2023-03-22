<?php
//
//namespace App\Http\Controllers\Frontend;
//
//use App\Http\Controllers\Controller;
//use App\Models\District;
//use App\Models\Division;
//use App\Models\DonateRequest;
//use App\Models\UserDetail;
//use App\Models\UserPost;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Redirect;
//
//class PostController extends Controller
//{
//    public function add(){
//        if(Auth::check()) {
//            $divisions = Division::orderBy('id', 'asc')->get();
//            return view('frontend.post.add_post', compact('divisions'));
//        }else{
//            return redirect()->route('login_home');
//        }
//    }
//
//    public function addPost(Request $request){
////        return($request->all());
//        $request->validate([
//            'blood_for' => 'required',
//            'date_blood_needed' => 'required',
//            'address' => 'required',
//        ]);
//
//        $userDetails = UserDetail::where('user_id', Auth::user()->id)->first();
//
//
//        if($request->blood_for == 1 ) {
//            $userpost = new UserPost();
//            $userpost->post_owner_id = Auth::user()->id;
//            $userpost->blood_group = $userDetails->blood_group;
//            $userpost->division_id = $userDetails->division_id;
//            $userpost->district_id = $userDetails->district_id;
//            $userpost->thana_id = $userDetails->thana_id;
//            $userpost->date_blood_needed = $request->date_blood_needed;
//            $userpost->contact_number = $userDetails->phone;
//            $userpost->address = $request->address;
//            $userpost->blood_for = $request->blood_for;
//            $userpost->slug = preg_replace('/\s+/u', '-', trim(strtolower(Auth::user()->name)));
//            $userpost->save();
//        }else{
//
//            $userpost = new UserPost();
//            $userpost->post_owner_id = Auth::user()->id;
//            $userpost->patient_name = $request->patient_name ?? '';
//            $userpost->blood_group = $request->blood_group;
//            $userpost->division_id = $request->division;
//            $userpost->district_id = $request->district;
//            $userpost->thana_id = $request->thana;
//            $userpost->date_blood_needed = $request->date_blood_needed;
//            $userpost->contact_number = $request->contact_number;
//            $userpost->address = $request->address;
//            $userpost->blood_for = $request->blood_for;
//            $userpost->slug = preg_replace('/\s+/u', '-', trim(strtolower($request->patient_name)));
//            $userpost->save();
//
//        }
//
//        return redirect()->route('all_post')->with('message', 'Post Create successfully.');
//
//    }
//
//    public function allPost(Request $request){
//        if ($request->search != ''){
//
//            $getDistricts = District::where('name','like','%'.$request->search.'%')
//                ->get()->pluck('id');
//            $districtsId = [];
//            if (count($getDistricts) > 0){
//                $districtsId = $getDistricts->toArray();
//            }
//
//            $allPosts = UserPost::orderBy('id', 'desc')
//                ->where('blood_group','like','%'.$request->search.'%')
//                ->orWhere('district_id',$districtsId)
//                ->get();
//        }else {
//
//            $allPosts = UserPost::orderBy('id', 'desc')->get();
//        }
//
//        return view('frontend.post.all_post',compact('allPosts'));
//    }
//
//    public function patientDetails($slug){
//        $patientdetails = UserPost::where('slug',$slug)->first();
//        return view('frontend.post.patient_details', compact('patientdetails'));
//    }
//
//    public function donateRequestPost($slug, Request $request){
//        if(Auth::check()) {
//            $request->validate([
//                'contact_number' => 'required',
//                'donate_type' => 'required',
//            ]);
//            $patientdetails = UserPost::where('slug', $slug)->first();
//
//            if (Auth::user()->blood_group == $patientdetails->blood_group) {
//                $donateRequest = new DonateRequest();
//                $donateRequest->taker_id = $patientdetails->user->id;
//                $donateRequest->giver_id = Auth::user()->id;
//                $donateRequest->contact_number = $request->contact_number;
//                $donateRequest->note = $request->note ?? '';
//                $donateRequest->confirmation_status = 3;
//                $donateRequest->donate_type = $request->donate_type;
//                $donateRequest->save();
//
//                UserDetail::where('status', 1)
//                    ->where('user_id', Auth::user()->id)
//                    ->update(['confirmation_status' => 3]);
//
//                    return redirect()->route('request_confirmation');
//                } else {
//                    return Redirect::back()->withErrors('message', 'Blood Group Not Match.');
//                }
//          }
//        else{
//            return redirect()->route('login_home');
//        }
//    }
//
//}
