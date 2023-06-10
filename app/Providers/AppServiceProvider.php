<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

class AppServiceProvider extends ServiceProvider
{
    
=======

class AppServiceProvider extends ServiceProvider
{
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
<<<<<<< HEAD
        HeadingRowFormatter::extend('custom', function($value, $key) {
            return 'do-something-custom' . $value; 
            
            // And you can use heading column index.
            // return 'column-' . $key; 
        });
=======
        //
>>>>>>> 117d0602e1f6f1193779b274c288052495a44cf7
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
