<?php

namespace App\Providers;

//use Illuminate\Contracts\Session\Session;
//use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use PhpParser\Node\Expr\Cast\Object_;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {  
        Inertia::share('flash',function(){
            return [
                'success' => Session::get('success')
               
            ];
        });
        
        Inertia::share([
           'errors'=> function(){
               return Session::get('errors') ? Session::get('errors')->getBag('default')->getMessages()
               : (Object)[];
           }
        ]);
       
    }
}
