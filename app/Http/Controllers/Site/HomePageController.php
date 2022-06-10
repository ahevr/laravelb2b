<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductModel;
use App\Models\Bayi;
use App\Models\Uye;
use App\Models\VerifyBayi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class HomePageController extends Controller
{

    public function index(){

        $products = ProductModel::orderBy("id","DESC")->IsActive()->paginate(12);

        return view("app.site.homepage")
            ->with("products",$products);

    }

    public function detail($url){

        $productDetailGet = ProductModel::where("product_url",$url)->IsActive()->firstOrFail();

        return view("app.site.detail")
            ->with("productDetailGet",$productDetailGet);

    }

    public function forgetShow(){

        return view("auth.forgot-password");

    }

    public function sendforget(Request $request){

        $request->validate(["bayi_email"=>"required|email|exists:bayi,bayi_email"]);

        $token = \Str::random(64);

        DB::table("password_resets")->insert([

            "bayi_email" =>$request->bayi_email,
            "token" =>$token,
            "created_at" => Carbon::now(),
        ]);

        $action_link = route("site.resetPassForm",["token"=>$token,"bayi_email"=>$request->bayi_email]);
        $body = "Linke tıklayarak şifrenizi değiştirebilirsiniz";

        Mail::send("email-forgot",["action_link"=>$action_link,"body"=>$body],function($message) use ($request){

            $message->from("ahmethusreversen@hotmail.com","Laravelb2B");
            $message->to($request->bayi_email,"Ahevr")
                ->subject("Şifremi Unuttum");
        });

        return redirect()->route("site.forgetpasswordForm")->with("fail","Girdiğiniz e-postaya ait bir hesap varsa, şifrenizi belirleme talimatlarını size e-postayla gönderdik");
    }

    public function showResetForm(Request $request,$token = null){

        return view("auth.reset-password")->with(["token"=>$token,"bayi_email"=>$request->bayi_email]);

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
            "password_confirmation" => "required",
        ]);

        $check_token = DB::table("password_resets")->where(["bayi_email"=>$request->bayi_email,"token"=>$request->token])->first();

        if(!$check_token){

            return back()->withInput()->with("toast_error","token geçersiz tekrar deneyin");

        }else{

            Bayi::where('bayi_email',$request->bayi_email)->update(["password"=>Hash::make($request->password)]);

            DB::table("password_resets")->where(["bayi_email"=>$request->bayi_email])->delete();

            return redirect()->route("site.uye_login")->with("toast_success","Şifreniz başarılı bir şekilde değiştirildi.")->with("verifyEmail",$request->bayi_email);

        }

    }

    public function verify(Request $request){

        $token = $request->token;

        $bayiUye = VerifyBayi::where("token",$token)->first();

        if(!is_null($bayiUye)){

            $uye = $bayiUye->bayi;

            if(!$uye->email_verified){

                $bayiUye->bayi->email_verified = 1;
                $bayiUye->bayi->save();


                return redirect()->route("site.uye_login")->with("toast_success","Üyeliğiniz Onaylanmıştır.Giriş Yapabilirsiniz")->with("verifiedEmail",$uye->bayi_email);

            } else {

                return redirect()->route("site.uye_login")->with("taost_error","Birşeyler yanlış gitti")->with("verifiedEmail",$uye->bayi_email);

            }
        }

    }



    public function check(Request $request){

        $request->validate([
            "bayi_email"=>"required|email|exists:bayi,bayi_email",
            "password"=>"required"
        ]);

        $creds = $request->only("bayi_email","password");

        if (Auth::guard("bayi")->attempt($creds)){

            return redirect()->route("site.index")
                ->with("toast_info","Hoş Geldiniz"." ".Auth::guard("bayi")->user()->bayi_adi);

        } else{

            return redirect()->route("site.uye_login")->with("fail","E-posta veya Şifre Hatalı");
        }

    }

    public function login(){

        return view("auth.uyeLogin");

    }

    public function logout(){

        Auth::guard("bayi")->logout();

        return redirect("/login")->with("toast_success","Çıkış Başarılı");
    }

    public function register(){

        return view("auth.uyeRegister");

    }

    public function create(Request $request){

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
        $bayiRegister->bayi_email = $request->bayi_email;
        $bayiRegister->bayi_telefon = $request->bayi_telefon;
        $bayiRegister->bayi_il = $request->bayi_il;
        $bayiRegister->bayi_ilce = $request->bayi_ilce;
        $bayiRegister->bayi_mahalle = $request->bayi_mahalle;
        $bayiRegister->bayi_adres = $request->bayi_adres;
        $bayiRegister->password =  Hash::make($request->password);

        $save =  $bayiRegister->save();

        $last_id = $bayiRegister->id;

        $token = $last_id.hash('sha256', \Str::random(120));

        $verfiyURL = route("site.verify",["token"=>$token,"service"=>"Email_verification"]);

        VerifyBayi::create([

            "bayi_id" => $last_id,
            "token" => $token,
            ]);

            $message = "Teşekkürler";

            $mail_data = [
                "recipient" => $request->bayi_email,
                "fromEmail" => $request->bayi_email,
                "fromName"  => $request->bayi_adi,
                "subject"  => "Email Verification",
                "body"    => $message,
                "actionLink" => $verfiyURL,
            ];

            Mail::send("email-template",$mail_data,function($message)use($mail_data){
                    $message->to($mail_data['recipient'])
                             ->from($mail_data["fromEmail"],$mail_data["fromName"])
                             ->subject($mail_data["subject"]);
            });

        return redirect()->route("site.uye_login")
            ->with("save",$save)
            ->with("toast_success", "Kayıt İşleminiz Başarılı Bir Şekilde Tamamlandı.Eposta adresinize gelen maili onaylayladıktan sonra giriş yapabilirsiniz.");


    }




}
