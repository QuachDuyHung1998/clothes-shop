<?php

namespace App\Http\ViewComposers;

use App\Models\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ConfigComposer
{
    public function __construct()
    {
        # code...
    }

    public function compose(View $view)
    {
        $arr_config = [];
        if (Cache::has('configs')) {
            $arr_config = Cache::get('configs');
        } else {
            $configs = Config::where('status', 1)->get();
            foreach ($configs as $config) {
                $arr_config[$config->key] = $config->value;
            };
            Cache::put('configs', $arr_config);
        }
        $view->with('configs', $arr_config);
    }
}