<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
|
*/



Route::group(["namespace"=>"site","as" => "site."],function (){

//    Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

    Route::get("lang/{lang}","LanguageController@switchLang")->name("lang.switch");

    Route::middleware(["guest:bayi"])->group(function (){

        Route::get("/login","HomePageController@login")->name("uye_login");
        Route::post("/check","HomePageController@check")->name("uye_check");
        Route::get("/register","HomePageController@register")->name("uye_register");
        Route::post("/register","HomePageController@create")->name("uye_register");
        Route::get("/verify","HomePageController@verify")->name("verify");

        Route::get("/password/forgot","HomePageController@forgetShow")->name("forgetpasswordForm");
        Route::post("/password/forgot","HomePageController@sendforget")->name("sendForget");
        Route::get("/password/reset/{token}","HomePageController@showResetForm")->name("resetPassForm");
        Route::post("/password/resetpw","HomePageController@resetpw")->name("resetpw");

    });

    Route::middleware(["auth:bayi","is_uye_verify_email"])->group(function (){


        Route::get ("/","HomePageController@index")->name("index");
        Route::post("/logout", 'HomePageController@logout')->name('logout');

    });

});





Route::group(["namespace"=>"Admin","prefix"=>"admin","as" => "admin."],function (){

    Route::middleware(["guest"])->group(function (){

        Route::get("/login","DashboardController@login")->name("login");
        Route::post("/check","DashboardController@check")->name("check");

    });

    Route::middleware(["auth"])->group(function (){

        Route::get("lang/{lang}","LanguageController@switchLang")->name("lang.switch");

        Route::get("/","DashboardController@index")->name("index");

        Route::post("/logout", 'DashboardController@logout')->name('logout');

        Route::group(["prefix"=>"users","as"=>"users."],function() {
            Route::get( "/","UsersController@index")->name("index");
            Route::get("/create","UsersController@create")->name("create");
            Route::post("/store","UsersController@store")->name("store");
            Route::get ("/delete/{id}","UsersController@delete")->name("deleteuser");
            Route::get ("/edit/{id}", "UsersController@edit")->name("edit");
            Route::post("/update/{id}", "UsersController@update")->name("update");
        });

        Route::group(["prefix"=>"role","as"=>"role."],function() {
            Route::get( "/","RoleController@index")->name("index");
            Route::get("/create","RoleController@create")->name("create");
            Route::get("/show","RoleController@show")->name("show");
            Route::post("/store","RoleController@store")->name("store");
            Route::get ("/edit/{id}", "RoleController@edit")->name("edit");
            Route::post("/update/{id}", "RoleController@update")->name("update");
        });

        Route::group(["prefix"=>"permission","as"=>"permission."],function() {
            Route::get( "/","PermissionController@index")->name("index");
            Route::get("/create","PermissionController@create")->name("create");
            Route::get("/show","PermissionController@show")->name("show");
            Route::post("/store","PermissionController@store")->name("store");
            Route::get ("/edit/{id}", "PermissionController@edit")->name("edit");
            Route::post("/update/{id}", "PermissionController@update")->name("update");
        });

        Route::group(["prefix"=>"products","as"=>"products."],function() {
            Route::get("/","ProductController@index")->name("index");
            Route::get("/create","ProductController@create")->name("create");
            Route::post("/store","ProductController@store")->name("store");
            Route::get ("/delete/{id}","ProductController@delete")->name("deleteproducts");
            Route::get ("/status/{id}","ProductController@status")->name("status");
            Route::get ("/isfyt/{id}","ProductController@isfyt")->name("isfytStatus");
            Route::get ("/isnew/{id}","ProductController@isnew")->name("isnewStatus");
            Route::get ("/edit/{id}","ProductController@edit")->name("edit");
            Route::post("/update/{id}","ProductController@update")->name("update");
            Route::get("/file-export", "ProductController@fileExport")->name("file-export");
            Route::post("/file-import", "ProductController@fileImport")->name('file-import');
            Route::get ("/deleteAll","ProductController@deleteAll")->name("deleteproductsAll");
            Route::get ("/search", "SearchController@index")->name("searchproducts");
        });

        Route::group(["prefix"=>"categories","as"=>"categories."],function() {
            Route::get( "/","CategoriesController@index")->name("index");
            Route::post("/addCategory","CategoriesController@store")->name("addCategory");
            Route::get ("/delete/{id}","CategoriesController@delete")->name("deleteCategory");
            Route::get ("/deleteSub/{id}","CategoriesController@deleteSub")->name("deleteCategorySub");
        });

        Route::group(["prefix"=>"bayi","as"=>"bayi."],function() {
            Route::get( "/","BayiController@index")->name("index");
            Route::get("/create","BayiController@create")->name("create");
            Route::post("/store","BayiController@store")->name("store");
            Route::get ("/delete/{id}","BayiController@delete")->name("delete");
            Route::get ("/edit/{id}","BayiController@edit")->name("edit");
            Route::post("/update/{id}","BayiController@update")->name("update");
            Route::get("/file-export", "BayiController@fileExport")->name("file-export");
            Route::post("/file-import", "BayiController@fileImport")->name('file-import');
            Route::get ("/search", "SearchBayiController@index")->name("searchbayi");
        });

        Route::group(["prefix"=>"slider","as"=>"slider."],function() {
            Route::get( "/","SliderController@index")->name("index");
            Route::get ("/createForm","SliderController@create")->name("create");
            Route::post("/store","SliderController@store")->name("store");
            Route::get ("/delete/{id}","SliderController@delete")->name("delete");
            Route::get ("/status/{id}","SliderController@status")->name("sliderStatus");
        });



    });




});
