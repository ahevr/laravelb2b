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
        Route::get("/verify","HomePageController@verify")->name("verify");

        Route::get("/password/forgot","HomePageController@forgetShow")->name("forgetpasswordForm");
        Route::post("/password/forgot","HomePageController@sendforget")->name("sendForget");
        Route::get("/password/reset/{token}","HomePageController@showResetForm")->name("resetPassForm");
        Route::post("/password/resetpw","HomePageController@resetpw")->name("resetpw");


    });

    Route::middleware(["auth:uye","is_uye_verify_email"])->group(function (){

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