<?php

namespace App\Providers;

use App\Http\ViewComposers\CategoryComposer;
use App\Http\ViewComposers\ConfigComposer;
use App\Http\ViewComposers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['site.layouts.header', 'site.layouts.header_02'], MenuComposer::class);
        View::composer(['site.layouts.main', 'site.layouts.header', 'site.layouts.header_02', 'site.layouts.footer'], ConfigComposer::class);
        View::composer(['site.layouts.header', 'site.layouts.header_02'], CategoryComposer::class);
    }
}