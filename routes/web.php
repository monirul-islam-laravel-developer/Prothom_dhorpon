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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
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
});
