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
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::get('/clear-cache', function () {
        Artisan::call('optimize:clear'); // clears cache, route, config, view
        Alert::success('Success', 'Cache cleared successfully!');
        return back();
    })->name('clear.cache');

    Route::get('migrate', function() {
            $exitCode = Artisan::call('migrate');

            if ($exitCode === 0) {
                $output = Artisan::output();
                return response()->json(['status' => 'success', 'message' => $output]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Migration failed'], 500);
            }
        })->name('migrate');

        Route::get('migrate-seed', function() {
            $exitCode = Artisan::call('migrate --seed');

            if ($exitCode === 0) {
                $output = Artisan::output();
                return response()->json(['status' => 'success', 'message' => $output]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Migration failed'], 500);
            }
        })->name('migrate-seed');

        Route::get('migrate-rollback', function() {
            $exitCodeRollBack = Artisan::call('migrate:rollback');

            if ($exitCodeRollBack === 0) {
                $output = Artisan::output();
                return response()->json(['status' => 'success', 'message' => $output]);
            } else {
                return response()->json(['status' => 'error', 'message' => 'Migration failed'], 500);
            }
        })->name('migrate-rollback');

    Route::middleware(['roles'])->group(function () {
        Route::group(['prefix' => 'role', 'as' => 'role.'], function(){
            Route::get('/add', [RoleController::class, 'index'])->name('add');
            Route::post('/new', [RoleController::class, 'create'])->name('new');
            Route::get('/manage', [RoleController::class, 'manage'])->name('manage');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');
        });

        Route::prefix('user')->group(function () {
            Route::get('/add', [UserController::class, 'index'])->name('user.add');
            Route::post('/new', [UserController::class, 'create'])->name('user.new');
            Route::get('/manage', [UserController::class, 'manage'])->name('user.manage');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
        });

        Route::resource('category',CategoryController::class);
    Route::resource('subcategory',SubCategoryController::class);
    Route::resource('reporter', ReporterController::class);
    Route::resource('editoral', EditoralController::class);
    Route::resource('logo', LogoController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('subsubcategory', SubsubCategoryController::class);
    Route::resource('upazila', UpazilaController::class);
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
});

Route::get('/get-districts/{division_id}', [UpazilaController::class, 'getDistricts'])->name('get.districts');
