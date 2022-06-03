<?php

namespace App\Http\Controllers\Admin;

use App\Helper\urlHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\SliderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{

    public function index(){

        $slider = SliderModel::latest()->paginate(10);
        return view('app.admin.page.slider.index')
            ->with('slider',$slider);
    }

    public function create(){

        return view('app.admin.page.slider.create');
    }

    public function store(Request $request){

        $request->validate([
            "title"=> "required|min:2|max:80","image"=> "required",
        ]);
            $slider = new SliderModel();
            $slider->fill(request()->all());
            $slider->url   = urlHelper::permalink($request->title);
            $slider->buton = ($request->buton == "on") ? 1 : 0;
            $slider->isActive = 1;


            if ($request->hasFile("image")){
                $file = $request->file("image");
                $extention = $file->getClientOriginalExtension();
                $filename = time(). "." .$extention;
                $file->move("app/admin/uploads/slider/",$filename);
                $slider->image = $filename;
            }


            $slider->save();

            return redirect("admin/slider")->with("toast_success","$request->title". " Adlı Slider Başarılı Bir Şekilde Eklendi");
    }

    public function status($id){

        $status = SliderModel::select("isActive")->where("id",$id)->first();

        if ($status->isActive == "1") {
            $isActive = "0";
        } else {
            $isActive = "1";
        }
        $isStatus = array("isActive"=>$isActive);

        SliderModel::where("id",$id)->update($isStatus);

        return back()->with("toast_success","Durum Değiştirme Başarılı");

    }

    public function delete($id){

        $slider = SliderModel::findOrFail($id);
        $destination = "app/admin/uploads/slider/".$slider->image;

        if (File::exists($destination)){

            File::delete($destination);

        }
        $slider->delete();
        return back()->with("toast_success","Silme Başarılı");
    }



}
