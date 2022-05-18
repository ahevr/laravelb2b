<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\ProductModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;


class DashboardController extends Controller
{

    public function index(){

        $productCount = ProductModel::count();
        $categories   = CategoriesModel::all();
        return view("app.admin.page.dashboard.index")
            ->with("categories",$categories)
            ->with("productCount",$productCount);

    }

    public function check(Request $request){

        $request->validate(["email"=>"required|email|exists:users,email"]);

        $creds = $request->only("email","password");

        if (Auth::guard("web")->attempt($creds)){

            return redirect()->route("admin.index")->with("toast_info","Hoş Geldiniz"." ".Auth::guard("web")->user()->name);

        }else{

            return redirect()->route("admin.login")->with("fail","E-posta veya Şifre Hatalı");;
        }

    }

    public function login(){

        return view("auth.login");

    }

    public function logout(){

        Auth::guard("web")->logout();

        return redirect("admin/login")->with("toast_success","Çıkış Başarılı");
    }


}
