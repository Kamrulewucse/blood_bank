<?php

namespace App\Models\Admin;

use App\Models\SubSubCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategoryFaq extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function subSubCategory() {
        return $this->belongsTo(SubSubCategory::class);
    }
}
