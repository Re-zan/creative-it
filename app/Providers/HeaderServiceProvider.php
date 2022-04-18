<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Header;
use Illuminate\Support\ServiceProvider;

class HeaderServiceProvider extends ServiceProvider
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
       
       $this->header();
       $this->menu();

    }
     //header
     private function header(){
        view()->composer('layouts.forntendapp', function($view) {
            $view->with('header', Header::orderBy('created_at', 'DESC')->first());
        });
    }
    //header
    private function menu(){
        view()->composer('layouts.forntendapp', function($view) {
            $view->with('menu', Menu::limit(7)->get());
        });
    }
}
