<?php

namespace App\Providers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Editoral;
use App\Models\Logo;
use App\Models\Notice;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        Carbon::setLocale('bn');
        Carbon::macro('bnDiffForHumans', function () {
            $diff = $this->diffForHumans();
            $bnDiff = str_replace(
                ['0','1','2','3','4','5','6','7','8','9'],
                ['০','১','২','৩','৪','৫','৬','৭','৮','৯'],
                $diff
            );
            return $bnDiff;
        });
        // Fetch the latest logo
        $logo = Logo::latest()->first();

        // Fetch latest 8 categories
        $categories8 = Category::orderBy('id','asc')->take(9)->get();
        $categories_all = Category::orderBy('id', 'asc')->skip(9)->take(15)->get();
        $editoral=Editoral::latest()->first();
        $scrollbars5 = Notice::where('status', 1)->orderBy('id', 'desc')->take(5)->get();
        $latestnews_10=Post::where('status',1)->orderBy('id','desc')->take(10)->get();
        $popularNews10 =Post::where('status', 1)->orderBy('view_count', 'desc')->take(10)->get();
        $latestnews_20=Post::where('status',1)->orderBy('id','desc')->take(20)->get();
        $popularNews20 =Post::where('status', 1)->orderBy('view_count', 'desc')->take(20)->get();

        $ads=Ads::latest()->first();



        // Share with all views
        view()->share([
            'webLogo' => $logo,
            'categories8' => $categories8,
            'categories_all'=>$categories_all,
            'editoral'=>$editoral,
            'scrollbars5'=>$scrollbars5,
            'ads'=>$ads,
            'latestnews_10'=>$latestnews_10,
            'latestnews_20'=>$latestnews_20,
            'popularNews10'=>$popularNews10,
            'popularNews20'=>$popularNews20
        ]);
    }

}
