<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Uye;
use App\Models\VerifyUye;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class HomePageController extends Controller
{


    public function forgetShow(){

        return view("auth.forgot-password");

    }

    public function sendforget(Request $request){

        $request->validate(["email"=>  "required|email|exists:uyes,email"]);

        $token = \Str::random(64);

        DB::table("password_resets")->insert([
                   
            "email" =>$request->email,
            "token" =>$token,
            "created_at" => Carbon::now(),
        ]);

        $action_link = route("site.resetPassForm",["token"=>$token,"email"=>$request->email]);
        $body = "Lİnke tıklayarak şifrenizi değiştirebilirsiniz";

        Mail::send("email-forgot",["action_link"=>$action_link,"body"=>$body],function($message) use ($request){

            $message->from("ahmethusreversen@hotmail.com","Laravelb2B");
            $message->to($request->email,"Ahevr")
                ->subject("Şifremi Unuttum");
        });


        return back()->with("toast_success","Şifre Sıfırlama E postası gönderildi");


    }

    public function showResetForm(Request $request,$token = null){


        return view("auth.reset-password")->with(["token"=>$token,"email"=>$request->email]);

    }

    public function resetpw(Request $request){

        $request->validate([
            "email" =>"required",
            "password" => "required",
            "password_confirmation" => "required",
        ]);

        $check_token = DB::table("password_resets")->where(["email"=>$request->email,"token"=>$request->token])->first();

        if(!$check_token){

            return back()->withInput()->with("toast_error","token geçersiz");

        }else{
            
            Uye::where('email',$request->email)->update(["password"=>Hash::make($request->password)]);

            DB::table("password_resets")->where(["email"=>$request->email])->delete();

            return redirect()->route("site.uye_login")->with("toast_success","Şifreniz başarılı bir şekilde değiştirildi.")->with("verifyEmail",$request->email);

        }


    }




    public function verify(Request $request){

        $token = $request->token;

        $verifyUye = VerifyUye::where("token",$token)->first();

        if(!is_null($verifyUye)){
            
            $uye = $verifyUye->uye;

            if(!$uye->email_verified){

                $verifyUye->uye->email_verified = 1;
                $verifyUye->uye->save();


                return redirect()->route("site.uye_login")->with("toast_success","email iş tamam")->with("verifiedEmail",$uye->email);    

            } else { 

                return redirect()->route("site.uye_login")->with("taost_success","email iş süper")->with("verifiedEmail",$uye->email);

            }
        }

    }


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
            "name"    => "required|min:2|max:80",
            "email"   => "required|email|unique:uyes,email",
            "surname" => "required|min:2|max:80",
            "phone"   => "required|digits:11|numeric",
            "il"      => "required",
            "ilce"    => "required",
            "mahalle" => "required",
            "adres"   => "required",
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

        $last_id = $adminRegister->id;

        $token = $last_id.hash('sha256', \Str::random(120));

        $verfiyURL = route("site.verify",["token"=>$token,"service"=>"Email_verification"]);

        VerifyUye::create([
            "uye_id"=>$last_id,
            "token"=>$token,
            ]);

            $message = "dear <b>".$request->name."</b>";
            $message = "Teşekkürler";

            $mail_data = [
                "recipient" => $request->email,
                "fromEmail" => $request->email,
                "fromName"  => $request->name,
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
            ->with("toast_success", "Sayın,". "<b>$request->name</b>" ." " ."<b>$request->surname</b>"  ." Kayıt İşleminiz Başarılı Bir Şekilde Tamamlandı. Giriş Yapabilirsiniz.");


    }


    public function index(){

        return view("app.site.homepage");

    }
}
