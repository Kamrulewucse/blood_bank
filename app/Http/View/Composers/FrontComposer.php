<?php

namespace App\Http\View\Composers;

use App\Enumeration\Role;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Cart;

class FrontComposer
{
    public function __construct()
    {

    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {

        $categories = Category::where('status',1)
                ->orderBy('sort')
                ->get();

        $data = [
            'categories'=>$categories
        ];

        $view->with('layoutData', $data);
    }
}
