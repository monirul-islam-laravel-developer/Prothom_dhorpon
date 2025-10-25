<?php

namespace App\Providers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Editoral;
use App\Models\Logo;
use App\Models\Notice;
use Illuminate\Support\ServiceProvider;

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
        // Fetch the latest logo
        $logo = Logo::latest()->first();

        // Fetch latest 8 categories
        $categories8 = Category::orderBy('id','asc')->take(9)->get();
        $categories_all = Category::orderBy('id', 'asc')->skip(9)->take(15)->get();
        $editoral=Editoral::latest()->first();
        $scrollbars5 = Notice::where('status', 1)->orderBy('id', 'desc')->take(5)->get();

        $ads=Ads::latest()->first();



        // Share with all views
        view()->share([
            'webLogo' => $logo,
            'categories8' => $categories8,
            'categories_all'=>$categories_all,
            'editoral'=>$editoral,
            'scrollbars5'=>$scrollbars5,
            'ads'=>$ads
        ]);
    }

}
