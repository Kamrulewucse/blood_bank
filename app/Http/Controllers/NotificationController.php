<?php

namespace App\Http\Controllers;

use App\Models\BloodRequest;
use App\Models\NotificationAccept;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function all() {
        return view('notification.all');
    }

    public function markRead(){
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function notificationDetails() {
        $bloodRequests = BloodRequest::get();
        return view('notification.notification_details',compact('bloodRequests'));
    }
    public function notificationDetail(BloodRequest $bloodRequest){
            $notificationAccept = NotificationAccept::where('blood_request_id', $bloodRequest->id)->where('acceptor_id',Auth::user()->id)->first();
        return view('notification.notification_detail',compact('bloodRequest','notificationAccept'));
    }
    public function notificationAccept(BloodRequest $bloodRequest){


            $notificationAccept = new NotificationAccept();
            $notificationAccept->blood_request_id= $bloodRequest->id;
            $notificationAccept->requester_id= $bloodRequest->taker_id;
            $notificationAccept->acceptor_id= Auth::user()->id;
            $notificationAccept->contact_number= $bloodRequest->contact_number;
            $notificationAccept->save();

            return redirect()->back();
    }

}
