<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClothController;
use App\Http\Controllers\ClothDesignController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SeekerController;
use App\Http\Controllers\SiteInformationController;
use App\Http\Controllers\TailorController;
use App\Http\Controllers\TailorProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;




    //front-end routes
    Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
    Route::get('/allproducts', [App\Http\Controllers\WelcomeController::class, 'getAllitem'])->name('allproducts');
    Route::get('productDetail/{id}', [App\Http\Controllers\WelcomeController::class, 'productDetail'])->name('productDetail');
    Route::get('/about', [App\Http\Controllers\WelcomeController::class, 'about'])->name('about');
    Route::get('/mens', [App\Http\Controllers\WelcomeController::class, 'getMensitem'])->name('mens');
    Route::get('/womens', [App\Http\Controllers\WelcomeController::class, 'getWomenitem'])->name('womens');
    Route::get('/childrens', [App\Http\Controllers\WelcomeController::class, 'getchildrenitem'])->name('childrens');
    Route::get('/elders', [App\Http\Controllers\WelcomeController::class, 'getelderitem'])->name('elders');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    //memberships
    Route::get('membership', [MemberController::class, 'getMembership'])->name('getMembership');
    Route::post('membership/addmember', [MemberController::class, 'addMember'])->name('addMember');
    Route::get('members', [MemberController::class, 'index'])->name('members');
    Route::get('/changeStatus', [MemberController::class, 'changeStatus'])->name('changeStatus');
    // Route::post('members/destroy/{id}', [MemberController::class, 'destroy'])->name('destroy');

    //tailor profile
    Route::get('tailor/profile/{name}', [TailorProfileController::class, 'profile'])->name('tailor_profile');
    Route::post('tailor/profile/store', [TailorProfileController::class,'store'])->name('tailor_profile.store');
    Route::patch('tailor/profile/update', [TailorProfileController::class, 'update'])->name('tailor_profile.update');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::post('/addtocart/{id}', [App\Http\Controllers\ClothController::class, 'addToCart'])->name('addToCart');
    Route::get('/myorder', [OrderController::class, 'myOrder'])->name('myorder');

    Route::group(['middleware' => 'admin'], function () {
          //fabrics
        Route::resource('categories', CategoryController::class);  

        //tailors
        Route::resource('tailors', TailorController::class);

        //colors
        Route::resource('colors', ColorController::class);

        //clothes
        Route::resource('clothes', ClothController::class);

        //cloth Designs
        Route::get('cloth/design/{id}',[ClothDesignController::class,'clothDesign'])->name('viewDesign');
        Route::get('cloths/{id}',[ClothDesignController::class,'createDesign'])->name('createDesign');
        Route::post('clothdesign/add',[ClothDesignController::class,'AddDesign'])->name('AddDesign');
        Route::get('design/edit/{id}',[ClothDesignController::class,'editDesign'])->name('EditDesign');
        Route::post('design/update/{id}',[ClothDesignController::class,'updateDesign'])->name('UpdateDesign');
        Route::get('design/delete/{id}',[ClothDesignController::class,'deleteDesign'])->name('DeleteDesign');
        Route::resource('designs', ClothDesignController::class);

        //site information
        Route::resource('site-informations', SiteInformationController::class)->except(['destroy', 'show', 'index']);



    });



});
