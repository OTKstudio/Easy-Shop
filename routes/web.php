<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
       route::view('/login','auth.login')->name('login');
       route::view('/register','user.register')->name('register');
       route::post('/create',[UserController::class,'create'])->name('create');
       route::post('/check',[UserController::class,'check'])->name('check');
 
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        route::view('/dashboard','home')->name('home');
        route::get('/profile',[UserController::class, 'UserProfile'])->name('profile');
        route::get('/logout',[UserController::class,'logout'])->name('logout');
        route::post('/profile/store',[UserController::class,'storeprofile'])->name('profile_store');
    });

});
route::get('/',[IndexController::class, 'index']); 



route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
       route::view('/login','admin.login')->name('login');
       route::view('/register','admin.register')->name('register');
       route::post('/create',[AdminController::class,'create'])->name('create');
       route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        route::view('/home','admin.index')->name('home');
        route::post('/logout',[AdminController::class,'logout'])->name('logout');
        route::get('/profile',[AdminController::class,'profile'])->name('profile');
        route::get('/profile/edit',[AdminController::class,'editprofile'])->name('profile_edit');
        route::post('/profile/store',[AdminController::class,'storeprofile'])->name('profile_store');
    });
});

// Admin Brand Routes
route::prefix('brand')->group(function(){
route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand');
route::post('/store',[BrandController::class, 'BrandStore'])->name('brand.store');
route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit');
route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update');
route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete');
});

// Admin Categories Routes
route::prefix('category')->group(function(){
    route::get('/view',[CategoryController::class, 'CategoryView'])->name('all.Category');
    route::post('/store',[CategoryController::class, 'CategoryStore'])->name('Category.store');
    route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('Category.edit');
    route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('Category.update');
    route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('Category.delete');
    });

    // Admin SubCategories Routes
route::prefix('Category')->group(function(){
    route::get('/sub/view',[SubCategoryController::class, 'SubCategoryView'])->name('all.SubCategory');
    route::post('/sub/store',[SubCategoryController::class, 'SubCategoryStore'])->name('SubCategory.store');
    route::get('/sub/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('SubCategory.edit');
    route::post('/sub/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('SubCategory.update');
    route::get('/sub/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name('SubCategory.delete');

    // Subsub Category
    route::get('/sub/sub/view',[SubCategoryController::class, 'SubSubCategoryView'])->name('all.SubSubCategory');
    route::get('/subcatories/{category_id}',[SubCategoryController::class, 'GetSubCategoryView']);
});

