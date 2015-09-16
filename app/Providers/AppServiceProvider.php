<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('partials.nav', function($view)
        	{
        		$view->with('user_logged', Auth::check() );
        		
        		if (Auth::check() )
        		{
        			//dd (Auth::user());
        			$view->with('user', compact(Auth::user()->name) ); 
        		}
        	});
        
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
