<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationAccept extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function requester(){
        return $this->belongsTo(User::class,'requester_id');
    }
    public function acceptor(){
        return $this->belongsTo(User::class,'acceptor_id');
    }
}
