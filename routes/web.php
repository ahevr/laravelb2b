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
*/
//Route::group(["namespace"=>"site","as" => "site."],function (){
//
//    Route::get ("/","HomePageController@index")->name("index");
//
//});


Route::group(["namespace"=>"site","as" => "site."],function (){

    Route::middleware(["guest:uye"])->group(function (){

        Route::get("/login","HomePageController@login")->name("uye_login");
        Route::post("/check","HomePageController@check")->name("uye_check");
        Route::get("/register","HomePageController@register")->name("uye_register");
        Route::post("/register","HomePageController@create")->name("uye_register");


    });

    Route::middleware(["auth:uye"])->group(function (){

        Route::get ("/","HomePageController@index")->name("index");


    });

});





Route::group(["namespace"=>"Admin","prefix"=>"admin","as" => "admin."],function (){

    Route::middleware(["guest"])->group(function (){

        Route::get("/login","DashboardController@login")->name("login");
        Route::post("/check","DashboardController@check")->name("check");

    });

    Route::middleware(["auth"])->group(function (){

        Route::get("/","DashboardController@index")->name("index");

        Route::post("/logout", 'DashboardController@logout')->name('logout');

    });




});