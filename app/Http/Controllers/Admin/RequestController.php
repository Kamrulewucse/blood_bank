<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodRequest;
use App\Models\DonateRequest;
use App\Models\NotificationAccept;
use App\Models\Transaction;
use App\Models\UserDetail;
use App\Models\UserPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    public function requestedList(){
        $bloodRequests = BloodRequest::with('takerName','giverName','userDetails')->where('confirmation_status', 2)
            ->latest()->get();
        $allUsers = UserDetail::all();
        return view('admin.requested.blood_request',compact('bloodRequests','allUsers'));
    }

    public function requestApprove(BloodRequest $bloodRequest){

        $bloodRequest->confirmation_status = 2;
        $bloodRequest->save();

        UserDetail::where('status', 1)
            ->where('user_id',$bloodRequest->giver_id)
            ->update(['confirmation_status' => 2]);

        return redirect()->route('request_blood')->with('message', 'Successfully Approved.');


    }
    public function cancelRequest(BloodRequest $bloodRequest){

        $bloodRequest->confirmation_status = 4;
        $bloodRequest->save();

        UserDetail::where('status', 1)
            ->where('user_id',$bloodRequest->giver_id)
            ->update(['confirmation_status' => 0]);

        return redirect()->route('request_blood')->with('message', 'Successfully Cancel.');


    }

    public function requestApproved(Request $request){

        $request->validate([
            'user_id' => 'required',
        ]);

       BloodRequest::where('id', $request->id)->update([
            'giver_id' => $request->user_id,
            'confirmation_status' => 1
        ]);


        return redirect()->back()->with('message', 'Successfully Complete.');
    }

    public function requestConfirm(BloodRequest $bloodRequest){

        $bloodRequest->confirmation_status = 1;
        $bloodRequest->save();

        //Giver Count and status change
        UserDetail::where('status', 1)
            ->where('user_id',$bloodRequest->giver_id)
            ->update([
                'donate_count'=> DB::raw('donate_count+1'),
                'confirmation_status' => 0,
                'last_blood_donate' =>  Carbon::now(),
            ]);

        //taker count

        UserDetail::where('status', 1)
            ->where('user_id',$bloodRequest->taker_id)
            ->update([
                'take_count'=> DB::raw('take_count+1'),
            ]);


        $transaction = new Transaction();
        $transaction->user_id = $bloodRequest->taker_id;
        $transaction->donate_type = $bloodRequest->donate_type;
        $transaction->type_status = 0;
        $transaction->taker_or_giver_id = $bloodRequest->giver_id;
        $transaction->date = Carbon::now();
        $transaction->address = $bloodRequest->address;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->user_id = $bloodRequest->giver_id;
        $transaction->donate_type = $bloodRequest->donate_type;
        $transaction->type_status = 1;
        $transaction->taker_or_giver_id = $bloodRequest->taker_id;
        $transaction->date = Carbon::now();
        $transaction->address = $bloodRequest->address;
        $transaction->save();

        return redirect()->route('approve')->with('message', 'Completed Successfully.');
    }

    public function requestCompleted(){
        $bloodRequests = BloodRequest::latest()->get();
       return view('admin.requested.all_confirm',compact('bloodRequests'));
    }

    public function allUsers(){
        $allUsers = UserDetail::with('user')
            ->with('district')
            ->latest()->get();

        return view('admin.requested.all_users',compact('allUsers'));
    }

    public function donateRequestedList(){

        $donateRequests = DonateRequest::with('takerName','giverName','userPost','userDetails')
            ->latest()->get();

        return view('admin.requested.all_donor_request',compact('donateRequests'));
    }


    public function donateRequestApprove(DonateRequest $donorRequest ){

        $donorRequest->confirmation_status = 2;
        $donorRequest->save();

        UserDetail::where('status', 1)
            ->where('user_id',$donorRequest->giver_id)
            ->update(['confirmation_status' => 2]);

        return redirect()->route('request_blood_donate')->with('message', 'Successfully Approved.');
    }

    public function cancelDonateRequest(DonateRequest $donorRequest){

        $donorRequest->confirmation_status = 4;
        $donorRequest->save();

        UserDetail::where('status', 1)
            ->where('user_id',$donorRequest->giver_id)
            ->update(['confirmation_status' => 0]);

        return redirect()->route('request_blood_donate')->with('message', 'Successfully Cancel.');

    }

    public function donateRequestApproved(){
        $donorRequest = DonateRequest::with('takerName','giverName','userPost','userDetails')
            ->latest()->get();

        return view('admin.requested.all_donate_approve',compact('donorRequest'));
    }

    public function donateRequestConfirm(DonateRequest $donorRequest){

        $donorRequest->confirmation_status = 1;
        $donorRequest->save();

        //Giver Count and status change

        UserDetail::where('status', 1)
            ->where('user_id',$donorRequest->giver_id)
            ->update([
                'donate_count'=> DB::raw('donate_count+1'),
                'confirmation_status' => 0,
                'last_blood_donate' =>  Carbon::now(),
            ]);

        //taker count
        UserDetail::where('status', 1)
            ->where('user_id',$donorRequest->taker_id)
            ->update([
                'take_count'=> DB::raw('take_count+1'),
            ]);

        $transaction = new Transaction();
        $transaction->user_id = $donorRequest->taker_id;
        $transaction->donate_type = $donorRequest->donate_type;
        $transaction->type_status = 0;
        $transaction->taker_or_giver_id = $donorRequest->giver_id;
        $transaction->date = Carbon::now();
        $transaction->save();

        $transaction = new Transaction();
        $transaction->user_id = $donorRequest->giver_id;
        $transaction->donate_type = $donorRequest->donate_type;
        $transaction->taker_or_giver_id = $donorRequest->taker_id;
        $transaction->date = Carbon::now();
        $transaction->save();

        return redirect()->route('approve_donate')->with('message', 'Completed Successfully.');
    }

    public function donateRequestCompleted(){

        $donateRequest = DonateRequest::with('userPost')->latest()->get();

        return view('admin.requested.all_donate_confirm',compact('donateRequest'));
    }
    public function requestAcceptList(BloodRequest $bloodRequest){
//        return($bloodRequest);
        $requestAcceptLists = NotificationAccept::with('requester')
            ->where('blood_request_id', $bloodRequest->id)
            ->get();
//        return($requestAcceptLists);
        return view('admin.requested.request_accept_list',compact('requestAcceptLists'));
    }
}
