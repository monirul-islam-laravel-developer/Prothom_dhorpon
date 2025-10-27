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

require base_path('routes/admin.php');

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/amader-poribar', [FrontReporterController::class, 'index'])->name('amaderporibar');
Route::get('/about-us', [FrontAboutUsController::class, 'index'])->name('about-us');
Route::get('/privacy-policy', [FrontPrivacyController::class, 'index'])->name('privacy-policy');
Route::get('/terms-and-condition', [Terms_and_ConditionController::class, 'index'])->name('terms-and-condition');
Route::get('/category-news/{id}/{slug}', [FrontCategoryNewsController::class, 'index'])->name('category-news');
Route::get('/sub-category-news/{id}/{slug}', [FrontSubCategoryNewsController::class, 'index'])->name('sub-category-news');
Route::get('/news-details/{id}/{slug}', [FrontNewsDetailController::class, 'index'])->name('news-detail');
