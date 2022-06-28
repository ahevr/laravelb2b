<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\SlickModel;
use App\Models\Bayi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class BioController extends Controller
{

    public function index($id){

        $bio = Bayi::where("id",$id)->get();
        return view("app.site.page.profile.index")
            ->with("bio",$bio);
    }

    public function hesabimDetay($id){

        $bio = Bayi::where("id",$id)->get();
        return view("app.site.page.profile.detail")
            ->with("bio",$bio);

    }

    public function resetpw(Request $request){

        $request->validate([
            'password'=> [
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

        Bayi::find(Auth::guard("bayi")->user()->id)->update(['password'=> Hash::make($request->password)]);

        Auth::guard("bayi")->logout();

        return redirect("/login")->with("toast_success","Şifreniz Başarılı Bir Şekilde Değiştirildi.Lüften Giriş Yapınız.");
    }
}
