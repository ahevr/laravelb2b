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
        $bayiRegister->bayi_adi = $request->bayi_adi;
        $bayiRegister->bayi_kodu = $request->bayi_kodu;
        $bayiRegister->bayi_email = $request->bayi_email;
        $bayiRegister->bayi_plasiyeri = $request->bayi_plasiyeri;
        $bayiRegister->bayi_telefon = $request->bayi_telefon;
        $bayiRegister->bayi_il = $request->bayi_il;
        $bayiRegister->bayi_ilce = $request->bayi_ilce;
        $bayiRegister->bayi_mahalle = $request->bayi_mahalle;
        $bayiRegister->bayi_adres = $request->bayi_adres;
        $bayiRegister->bayi_isk1 = $request->bayi_isk1;
        $bayiRegister->bayi_isk2 = $request->bayi_isk2;
        $bayiRegister->bayi_isk3 = $request->bayi_isk3;
        $bayiRegister->bayi_kdv = $request->bayi_kdv;
        $bayiRegister->email_verified = 1;
        $bayiRegister->password =  Hash::make($request->password);



        $bayiRegister->save();

        return back()->with("toast_success", "Kayıt İşleminiz Başarılı Bir Şekilde Tamamlandı.Eposta adresinize gelen maili onaylayladıktan sonra giriş yapabilirsiniz.");

//        $last_id = $bayiRegister->id;
//
//        $token = $last_id.hash('sha256', \Str::random(120));
//
//        $verfiyURL = route("site.verify",["token"=>$token,"service"=>"Email_verification"]);
//
//        VerifyBayi::create([
//
//            "bayi_id" => $last_id,
//            "token" => $token,
//        ]);
//
//        $message = "Teşekkürler";
//
//        $mail_data = [
//            "recipient" => $request->bayi_email,
//            "fromEmail" => $request->bayi_email,
//            "fromName"  => $request->bayi_adi,
//            "subject"  => "Email Verification",
//            "body"    => $message,
//            "actionLink" => $verfiyURL,
//        ];
//
//        Mail::send("email-template",$mail_data,function($message)use($mail_data){
//            $message->to($mail_data['recipient'])
//                ->from($mail_data["fromEmail"],$mail_data["fromName"])
//                ->subject($mail_data["subject"]);
//        });
//
//        return redirect()->route("site.uye_login")
//            ->with("save",$save)
//            ->with("toast_success", "Kayıt İşleminiz Başarılı Bir Şekilde Tamamlandı.Eposta adresinize gelen maili onaylayladıktan sonra giriş yapabilirsiniz.");


    }


    public function update(Request $request, $id){

        $bayi = Bayi::findOrFail($id);

        $bayi->bayi_email = $request->bayi_email;
        $bayi->bayi_adi = $request->bayi_adi;
        $bayi->bayi_kodu = $request->bayi_kodu;
        $bayi->bayi_plasiyeri = $request->bayi_plasiyeri;
        $bayi->bayi_telefon = $request->bayi_telefon;
        $bayi->bayi_il = $request->bayi_il;
        $bayi->bayi_ilce = $request->bayi_ilce;
        $bayi->bayi_adres = $request->bayi_adres;
        $bayi->bayi_mahalle = $request->bayi_mahalle;
        $bayi->bayi_isk1 = $request->bayi_isk1;
        $bayi->bayi_isk2 = $request->bayi_isk2;
        $bayi->bayi_isk3 = $request->bayi_isk3;
        $bayi->bayi_kdv = $request->bayi_kdv;

        $bayi->update();

        return back()->with("toast_success","$request->bayi_adi". " Adlı Bayi Başarılı Bir Şekilde Güncellendi");

    }



    public function delete($id){

        $bayi = Bayi::find($id);
        $bayi->delete();
        return back()->with("toast_success","Bayi Başarılı Bir Şekilde Silindi");

    }
}
