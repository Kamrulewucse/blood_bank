<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function district(){
        return $this->belongsTo(District::class, 'district_id');
    }
    public function thana(){
        return $this->belongsTo(Upazila::class, 'thana_id');
    }


}
