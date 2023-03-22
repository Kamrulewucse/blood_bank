<?php

namespace App\Http\View\Composers;

use App\Enumeration\OrderStatus;
use App\Models\SaleOrder;
use Illuminate\View\View;

class AdminComposer
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

        $data = [];

        $view->with('layoutData', $data);
    }
}
