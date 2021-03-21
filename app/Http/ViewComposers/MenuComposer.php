<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class MenuComposer
{
    public function __construct()
    {
        # code...
    }

    public function compose(View $view)
    {
        $menu = [];
        if (Cache::has('menu')) {
            $menu = Cache::get('menu');
        } else {
            $menu = Menu::where('status', 1)->orderBy('order', 'asc')->get();
            Cache::put('menu', $menu);
        }
        $view->with('menu', $menu);
    }
}