<?php

namespace App\Providers;
use App\Models\type_product;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        View()->composeR('Component.header',function($view){
            $loai_sp = type_product::all();
            $view->with('loai_sp',$loai_sp);
        });
    }
}
