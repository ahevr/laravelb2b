<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Uye;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class HomePageController extends Controller
{

    public function check(Request $request){

        $request->validate(["email"=>"required|email|exists:uyes,email","password"=>"required"]);

        $creds = $request->only("email","password");

        if (Auth::guard("uye")->attempt($creds)){

            return redirect()->route("site.index");

        }else{

            return redirect()->route("site.uye_login");
        }

    }

    public function login(){

        return view("auth.uyeLogin");

    }

    public function register(){

        return view("auth.uyeRegister");

    }

    public function create(Request $request){

        $request->validate([
            "name" => "required|min:2|max:80",
            "email" => "required",
            "surname" =>"required|min:2|max:80",
            "phone" => "required|digits:11|numeric",
            "il" => "required",
            "ilce" => "required",
            "mahalle" => "required",
            "adres" => "required",
            'password' => [
                'required',
                'string',
                Password::min(6)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
                'confirmed'
            ],
        ]);
        $adminRegister = new Uye();

        $adminRegister->name = $request->name;
        $adminRegister->email = $request->email;
        $adminRegister->surname = $request->surname;
        $adminRegister->phone = $request->phone;
        $adminRegister->il = $request->il;
        $adminRegister->ilce = $request->ilce;
        $adminRegister->adres = $request->adres;
        $adminRegister->mahalle = $request->mahalle;
        $adminRegister->password =  Hash::make($request->password);

        $save = $adminRegister->save();

        return redirect()->route("site.uye_login")
            ->with("save",$save)
            ->with("toast_success", "Sayın,". "<b>$request->name</b>" ." " ."<b>$request->surname</b>"  ." Kayıt İşleminiz Başarılı Bir Şekilde Tamamlandı. Giriş Yapabilirsiniz.");


    }


    public function index(){

        return view("app.site.homepage");

    }
}
