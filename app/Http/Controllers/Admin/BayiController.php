<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BayiExport;
use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\BayiImport;
use App\Imports\ProductImport;
use App\Models\Admin\BayiCariModel;
use App\Models\Admin\ProductModel;
use App\Models\Bayi;
use App\Models\VerifyBayi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Maatwebsite\Excel\Facades\Excel;

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
        $bayiRegister->save();

        return redirect("admin/bayi")->with("toast_success","$request->bayi_adi". " Adlı Bayi Başarılı Bir Şekilde Eklendi");

    }

    public function update(Request $request, $id){

        $bayi = Bayi::findOrFail($id);
        $bayi->fill($request->all());
        $bayi->update();
        return back()->with("toast_success","$request->bayi_adi". " Adlı Bayi Başarılı Bir Şekilde Güncellendi");

    }

    public function delete($id){

        $bayi = Bayi::findOrFail($id);

        $bayi->delete();

        return back()->with("toast_success","Bayi Başarılı Bir Şekilde Silindi");

    }

    public function fileImport(Request $request){

        Excel::import(new BayiImport,request()->file('file'));
        return back();
    }

    public function fileExport(){

        return Excel::download(new BayiExport, 'bayi-collection.xlsx');
    }

    public function deleteAll(){

        Bayi::truncate();
        return back();

    }

    public function iskUpdate(Request $request){

        DB::table('bayi')->update(['bayi_isk1' => $request->bayi_isk1]);

        return back()->with("toast_success","Bayi Başarılı Bir Şekilde sdsds");
    }
    public function isk2Update(Request $request){

        DB::table('bayi')->update(['bayi_isk2' => $request->bayi_isk2]);

        return back()->with("toast_success","Bayi Başarılı Bir Şekilde sdsds");
    }

    public function cari($id){

        $bayi = Bayi::findOrFail($id);
        $data  = BayiCariModel::where('bayi_id', $id)->get();
        return view("app.admin.page.bayi.cari")
            ->with("bayi", $bayi)
            ->with("data", $data);

    }

    public function cariSet(Request $request){

        //TODO: validation eklenecek

        $bayi =  new BayiCariModel();

        $bayi->bayi_id = $request->id;
        $bayi->fis_no = $request->fis_no;
        $bayi->desc = $request->desc;
        $bayi->vade_tarihi = $request->vade_tarihi;
        $bayi->borc_tutari = $request->borc_tutari;
        $bayi->alacak_tutari = $request->alacak_tutari;
        $bayi->borc_bakiye = $request->borc_bakiye;
        $bayi->alacak_bakiye = $request->alacak_bakiye;
        $bayi->save();

        return back()->with("toast_success","Cari Başarılı Bir Şekilde Eklendi");
    }



}

