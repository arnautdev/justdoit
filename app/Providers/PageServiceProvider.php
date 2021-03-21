<?php

namespace App\Providers;

use App\Traits\UtilsTrait;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider
{
    use UtilsTrait;

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
        view()->share('page', $this);
    }
}
