<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bayi;
use Illuminate\Http\Request;

class SearchBayiController extends Controller
{
    public function index(){
        if (strip_tags(trim(request()->get('q')!=""))){
            $q = strip_tags(trim(request()->get("q")));
            $bayi = Bayi::where("bayi_adi","like","%".$q."%")
                ->orWhere("bayi_kodu","like","%".$q."%")
                ->paginate(5);
            if (count($bayi) > 0){
                return view("app.admin.page.bayi.index")
                    ->with("bayi",$bayi)
                    ->with("success","Arama Sonuçları");
            } else {
                return view("errors.404");
            }
        } else {
            return redirect("/admin/bayi")->with("toast_warning","Lütfen Bir Arama Yapınız");
        }
    }
}
