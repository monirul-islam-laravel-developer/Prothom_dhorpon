<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\EditoralController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubsubCategoryController;
use App\Http\Controllers\UpazilaController;
use App\Http\Controllers\WebExtraController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontReporterController;
use App\Http\Controllers\FrontAboutUsController;
use App\Http\Controllers\FrontPrivacyController;
use App\Http\Controllers\Terms_and_ConditionController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\FrontCategoryNewsController;
use App\Http\Controllers\FrontSubCategoryNewsController;
use App\Http\Controllers\FrontNewsDetailController;

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/amader-poribar', [FrontReporterController::class, 'index'])->name('amaderporibar');
Route::get('/about-us', [FrontAboutUsController::class, 'index'])->name('about-us');
Route::get('/privacy-policy', [FrontPrivacyController::class, 'index'])->name('privacy-policy');
Route::get('/terms-and-condition', [Terms_and_ConditionController::class, 'index'])->name('terms-and-condition');
Route::get('/category-news/{id}/{slug}', [FrontCategoryNewsController::class, 'index'])->name('category-news');
Route::get('/sub-category-news/{id}/{slug}', [FrontSubCategoryNewsController::class, 'index'])->name('sub-category-news');
Route::get('/news-details/{id}/{slug}', [FrontNewsDetailController::class, 'index'])->name('news-detail');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/clear-cache', function () {
        Artisan::call('optimize:clear'); // clears cache, route, config, view
        Alert::success('Success', 'Cache cleared successfully!');
        return back();
    })->name('clear.cache');

    Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubCategoryController::class);
    Route::resource('reporter', ReporterController::class);
    Route::resource('editoral', EditoralController::class);
    Route::resource('logo', LogoController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('subsubcategory', SubsubCategoryController::class);
    Route::resource('upazila', UpazilaController::class);
    Route::get('/get-districts/{division_id}', [UpazilaController::class, 'getDistricts'])->name('get.districts');
    Route::resource('webextra', WebExtraController::class);
    Route::resource('video', VideoController::class);
    Route::resource('ads', AdsController::class);
    Route::resource('notice', NoticeController::class);
    Route::resource('post', PostController::class);
    Route::get('posts/get-subcategories/{category_id}', [PostController::class, 'getSubcategories']);
    Route::get('posts/get-subsubcategories/{subcategory_id}', [PostController::class, 'getSubSubCategories']);
    Route::get('posts/get-upzelas/{subsub_category_id}', [PostController::class, 'getUpzelas']);
    Route::get('/posts/search-reporters', [PostController::class, 'searchReporters'])->name('post.searchReporters');
});
