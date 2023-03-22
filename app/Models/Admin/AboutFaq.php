<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutFaq extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'answer', 'status'
    ];
}
