<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BayiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BayiController extends Controller
{

    public function index(){

        $bayi = BayiModel::latest()->paginate(10);
        return view("app.admin.page.bayi.index")
            ->with("bayi",$bayi);

    }


    public function create(){

        return view("app.admin.page.bayi.create");

    }


    public function store(Request $request){

        $request->validate([
            "bayi_email"  => "required", "bayi_adi"  => "required", "bayi_kodu"  => "required",
            "bayi_plasiyeri"  => "required", "bayi_telefon"  => "required", "bayi_il"  => "required", "bayi_ilce"  => "required",
            "bayi_adres"  => "required", "bayi_password"  => "required", "bayi_isk1"  => "required", "bayi_isk2"  => "required",
            "bayi_isk3"  => "required", "bayi_kdv"  => "required",]);

        $bayi = new BayiModel();

        $bayi->bayi_email = $request->bayi_email;
        $bayi->bayi_adi = $request->bayi_adi;
        $bayi->bayi_kodu = $request->bayi_kodu;
        $bayi->bayi_plasiyeri = $request->bayi_plasiyeri;
        $bayi->bayi_telefon = $request->bayi_telefon;
        $bayi->bayi_il = $request->bayi_il;
        $bayi->bayi_ilce = $request->bayi_ilce;
        $bayi->bayi_adres = $request->bayi_adres;
        $bayi->bayi_password = Hash::make($request->bayi_password);
        $bayi->bayi_isk1 = $request->bayi_isk1;
        $bayi->bayi_isk2 = $request->bayi_isk2;
        $bayi->bayi_isk3 = $request->bayi_isk3;
        $bayi->bayi_kdv = $request->bayi_kdv;

        $bayi->save();

        return redirect("admin/bayi")->with("toast_success","$request->bayi_adi". " Adlı Bayi Başarılı Bir Şekilde Eklendi");

    }

    public function edit($id){

        $bayi = BayiModel::where("id",$id)->first();
        return view("app.admin.page.bayi.update")
            ->with("bayi",$bayi);
    }


    public function update(Request $request, $id){

        $bayi = BayiModel::findOrFail($id);

        $bayi->bayi_email = $request->bayi_email;
        $bayi->bayi_adi = $request->bayi_adi;
        $bayi->bayi_kodu = $request->bayi_kodu;
        $bayi->bayi_plasiyeri = $request->bayi_plasiyeri;
        $bayi->bayi_telefon = $request->bayi_telefon;
        $bayi->bayi_il = $request->bayi_il;
        $bayi->bayi_ilce = $request->bayi_ilce;
        $bayi->bayi_adres = $request->bayi_adres;
        $bayi->bayi_password = Hash::make($request->bayi_password);
        $bayi->bayi_isk1 = $request->bayi_isk1;
        $bayi->bayi_isk2 = $request->bayi_isk2;
        $bayi->bayi_isk3 = $request->bayi_isk3;
        $bayi->bayi_kdv = $request->bayi_kdv;

        $bayi->update();

        return back()->with("toast_success","$request->bayi_adi". " Adlı Bayi Başarılı Bir Şekilde Güncellendi");

    }



    public function delete($id){

        $bayi = BayiModel::find($id);
        $bayi->delete();
        return back()->with("toast_success","Bayi Başarılı Bir Şekilde Silindi");

    }
}
