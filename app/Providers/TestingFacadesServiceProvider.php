<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Support\MyString;

class TestingFacadesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('myLibrary', function($app) {
            return new MyString;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
