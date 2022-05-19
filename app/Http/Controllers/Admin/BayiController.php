<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bayi;
use App\Models\VerifyBayi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class BayiController extends Controller
{
    public function index(){

        $bayi = Bayi::latest()->paginate(10);
        return view("app.admin.page.bayi.index")
            ->with("bayi",$bayi);
    }
    public function create(){

        return view("app.admin.page.bayi.create");

    }

    public function edit($id){

        $bayi = Bayi::where("id",$id)->first();
        return view("app.admin.page.bayi.update")
            ->with("bayi", $bayi);
    }

    public function store(Request $request){

        $request->validate([
            "bayi_adi"    => "required|min:2|max:80",
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

        $bayiRegister = new Bayi();

        $bayiRegister->fill($request->all());
        $bayiRegister->email_verified = 1;
        $bayiRegister->password =  Hash::make($request->password);
        $bayiRegister->bayi_mahalle = $request->bayi_mahalle;

        $bayiRegister->save();

        return back()->with("toast_success", "Kayıt İşleminiz Başarılı Bir Şekilde Tamamlandı.Eposta adresinize gelen maili onaylayladıktan sonra giriş yapabilirsiniz.");

    }


    public function update(Request $request, $id){

        $bayi = Bayi::findOrFail($id);
        $bayi->fill($request->all());
        $bayi->bayi_isk2 = $request->bayi_isk2;
        $bayi->update();
        return back()->with("toast_success","$request->bayi_adi". " Adlı Bayi Başarılı Bir Şekilde Güncellendi");

    }

    public function delete($id){

        $bayi = Bayi::findOrFail($id);

        $bayi->delete();

        return back()->with("toast_success","Bayi Başarılı Bir Şekilde Silindi");

    }
}
