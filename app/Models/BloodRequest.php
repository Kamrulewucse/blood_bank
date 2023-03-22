<?php

namespace App\Models;

use App\Notifications\BloodRequestNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function takerName(){
        return $this->belongsTo(User::class,'taker_id');
    }
    public function giverName(){
        return $this->belongsTo(User::class,'giver_id');
    }

    public function userDetails(){
        return $this->belongsTo(UserDetail::class,'giver_id', 'user_id');
    }

    public function notificationDetails(){
        return $this->belongsTo(BloodRequestNotification::class,'notifiable_id', 'giver_id');
    }

    public function division(){
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district_id');
    }
    public function thana(){
        return $this->belongsTo(Upazila::class, 'thana_id');
    }
}
