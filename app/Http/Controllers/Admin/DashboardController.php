<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function check(Request $request){

        $request->validate(["email"=>"required|email|exists:users,email"]);

        $creds = $request->only("email","password");

        if (Auth::guard("web")->attempt($creds)){

            return redirect()->route("admin.index")->with("toast_success","Hoş Geldiniz"." ".Auth::guard("web")->user()->name);

        }else{

            return redirect()->route("admin.login")->with("fail","E-posta veya Şifre Hatalı");;
        }

    }

    public function index(){

        return view("app.admin.page.dashboard.index");

    }

    public function login(){

        return view("auth.login");

    }

    public function logout(){

        Auth::guard("web")->logout();

        return redirect("admin/login")->with("toast_success","Çıkış Başarılı");
    }


}
