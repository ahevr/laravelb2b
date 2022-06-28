<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SlickModel;
use App\Models\Admin\SliderModel;
use Illuminate\Http\Request;

class SlickController extends Controller
{
    public function index(){

        $slick = SlickModel::all();

        return view("app.admin.page.slick.index")
            ->with("slick",$slick);

    }

    public function create(){

        return view("app.admin.page.slick.create");

    }

    public function store(Request $request){

        $slick = new SlickModel();

        $slick->fill(request()->all());

        $slick->save();

        return redirect("admin/slick")->with("toast_success","$request->title". " Adlı Slick Slider Başarılı Bir Şekilde Eklendi");

    }

    public function delete($id){

        $slick = SlickModel::findOrFail($id);

        $slick->delete();

        return back()->with("toast_success","Silme Başarılı");

    }
}
