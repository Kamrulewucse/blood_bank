<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonateRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function takerName(){
        return $this->belongsTo(User::class,'taker_id');
    }
    public function giverName(){
        return $this->belongsTo(User::class,'giver_id');
    }

    public function userPost(){
        return $this->belongsTo(UserPost::class, 'taker_id','post_owner_id');
    }

    public function userDetails(){
        return $this->belongsTo(UserDetail::class,'giver_id', 'user_id');
    }
}
