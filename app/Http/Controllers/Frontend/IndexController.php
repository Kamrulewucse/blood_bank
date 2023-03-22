<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PurcheseDonate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class IndexController extends Controller
{
    public function login(){

        $divisions = Division::orderBy('id', 'asc')->get();
        $districts = District::orderBy('id', 'asc')->get();
        $thana = Upazila::orderBy('id', 'asc')->get();

        return view('frontend.profile.user_login',compact('divisions','districts','thana'));
    }
    public function userAdd(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:users',
            'email' => 'nullable|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'date_of_birth' => 'required',
            'blood_group' => 'required',
            'division' => 'required',
            'district' => 'required',
            'thana' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'phone' => 'required',
//            'image' => 'required',
        ]);

//           // Upload image
//           $file = $request->file('image');
//           $filename = Uuid::uuid1()->toString().'.'.$file->getClientOriginalExtension();
//           $destinationPath = 'public/uploads/userphoto';
//           $file->move($destinationPath, $filename);
//
//           $path = 'uploads/userphoto/'.$filename;

        $user = new User();
        $user->name = $request->name;
        $user->role = 2;
        $user->email = $request->email;
        $user->blood_group = $request->blood_group;
//        $user->image = $path;
        $user->password = bcrypt($request->password);
        $user->save();

        $userdetails = new UserDetail();
        $userdetails->user_id = $user->id;
        $userdetails->date_of_birth = $request->date_of_birth;
        $userdetails->blood_group = $request->blood_group;
        $userdetails->last_blood_donate = $request->last_blood_donate;
        $userdetails->age = $request->age;
        $userdetails->weight = $request->weight;
        $userdetails->division_id = $request->division;
        $userdetails->district_id = $request->district;
        $userdetails->thana_id = $request->thana;
        $userdetails->phone = $request->phone;
        $userdetails->slug = preg_replace('/\s+/u', '-', trim(strtolower($user->name)));
        $userdetails->save();


        Auth::login($user);
        return redirect()->route('home')->with('message', 'Registation Successfull. ');



        //return $request->all();
    }

    public function loginPost(Request $request) {

        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        $user = User::where('email', $request->email)
                    ->where('role', 2)->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withInput()
                ->with('error','Your Credential is not correct !');
        }else{
            Auth::login($user);
            return redirect()->route('home');
        }
    }

    public function getDistrict(Request $request) {
        $district = District::where('division_id', $request->divisionId)
            ->get()->toArray();
        return response()->json($district);
    }

    public function getThana(Request $request) {
        $thana = Upazila::where('district_id', $request->districtId)
            ->get()->toArray();
        return response()->json($thana);
    }

}
