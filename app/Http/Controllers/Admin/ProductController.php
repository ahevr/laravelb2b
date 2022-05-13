<?php

namespace App\Http\Controllers\Admin;

use App\Helper\urlHelper;
use App\Http\Controllers\Controller;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\ProductModel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ProductTrait;

class ProductController extends Controller
{

    use ProductTrait;

    public function index(){

    $products = ProductModel::latest()->paginate(10);
//      $products = $this->getDataPaginate(new ProductModel());

        return view("app.admin.page.products.index")
            ->with("products",$products);

    }

    public function create(){

      $categories = CategoriesModel::all();
//    $categories = $this->getData(new CategoriesModel());

        return view("app.admin.page.products.create")
            ->with("categories",$categories);

    }

    public function store(Request $request){

        $request->validate([
            "product_name"=> "required|min:2|max:80","product_code"=> "required", "product_desc"=> "required",
            "stock_status"=> "required", "stock_quantity"=> "required", "price"=> "required", "discount"=> "required",
            "tax"=> "required", "usage_area"=> "required", "kol_sayisi"=> "required", "material"=> "required",
            "width"=> "required", "height"=> "required", "length"=> "required", "kg"=> "required",
            "warranty_period"=> "required", "brand"=> "required", "color"=> "required", "bulb"=> "required",
            "category_id"=> "required", "duy"=> "required",]);

        $products = new ProductModel();

        $products->product_url     = urlHelper::permalink($request->product_name);
        $products->product_name    = $request->product_name;
        $products->product_code    = $request->product_code;
        $products->product_desc    = $request->product_desc;
        $products->stock_status    = $request->stock_status;
        $products->stock_quantity  = $request->stock_quantity;
        $products->price           = $request->price;
        $products->discount        = $request->discount;
        $products->tax             = $request->tax;
        $products->total_price     = $request->total_price;
        $products->usage_area      = $request->usage_area;
        $products->kol_sayisi      = $request->kol_sayisi;
        $products->material        = $request->material;
        $products->width           = $request->width;
        $products->height          = $request->height;
        $products->length          = $request->length;
        $products->kg              = $request->kg;
        $products->warranty_period = $request->warranty_period;
        $products->catalog_year    = $request->catalog_year;
        $products->isActive        = 1;
        $products->isNew           = 1;
        $products->isFyt           = 1;
        $products->created_by      = Auth::guard("web")->id();
        $products->update_by       = 0;
        $products->brand           = $request->brand;
        $products->color           = $request->color;
        $products->bulb            = $request->bulb;
        $products->category_id     = $request->category_id;
        $products->duy             = $request->duy;
        $products->image           = $request->file('image');


//        if($request->hasfile('image')) {
//            $file = $request->file('image');
//            $extenstion = $file->getClientOriginalExtension();
//            $filename = time().'.'.$extenstion;
//            $file->move('app/admin/uploads/urunler/', $filename);
//            $products->image = $filename;
//        }

        $products->save();

        return redirect("admin/products")->with("toast_success","$request->product_name". " Adlı Ürün Başarılı Bir Şekilde Eklendi");

    }

    public function edit($id){

        $categories = CategoriesModel::all();

        $product = ProductModel::where("id",$id)->first();

        return view("app.admin.page.products.update")
            ->with("categories",$categories)
            ->with("product",$product);

    }

    public function update(Request $request , $id){

        $products = ProductModel::findOrFail($id);

        $products->product_url     = urlHelper::permalink($request->product_name);
        $products->product_name    = $request->product_name;
        $products->product_code    = $request->product_code;
        $products->product_desc    = $request->product_desc;
        $products->stock_status    = $request->stock_status;
        $products->stock_quantity  = $request->stock_quantity;
        $products->price           = $request->price;
        $products->discount        = $request->discount;
        $products->tax             = $request->tax;
        $products->total_price     = $request->total_price;
        $products->usage_area      = $request->usage_area;
        $products->kol_sayisi      = $request->kol_sayisi;
        $products->material        = $request->material;
        $products->width           = $request->width;
        $products->height          = $request->height;
        $products->length          = $request->length;
        $products->kg              = $request->kg;
        $products->warranty_period = $request->warranty_period;
        $products->catalog_year    = $request->catalog_year;
        $products->update_by       = Auth::guard("web")->id();
        $products->brand           = $request->brand;
        $products->color           = $request->color;
        $products->bulb            = $request->bulb;
        $products->category_id     = $request->category_id;
        $products->duy             = $request->duy;

        if($request->hasfile('image')) {
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('app/admin/uploads/urunler/', $filename);
            $products->image = $filename;
        }

        $products->update();

        return back()->with("toast_success","$request->product_name". " Adlı Ürün Başarılı Bir Şekilde Güncellendi");

    }

    public function status ($id){

        $status = ProductModel::select("isActive")->where("id",$id)->first();
        if ($status->isActive == "1") {
            $isActive = "0";
        } else {
            $isActive = "1";
        }
        $isStatus = array("isActive"=>$isActive);
        ProductModel::where("id",$id)->update($isStatus);
        return back()->with("toast_success","Durum Değiştirme Başarılı");

    }

    public function isfyt ($id){

        $status = ProductModel::select("isFyt")->where("id",$id)->first();
        if ($status->isFyt == "1") {
            $isFyt = "0";
        } else {
            $isFyt = "1";
        }
        $isFyt = array("isFyt"=>$isFyt);
        ProductModel::where("id",$id)->update($isFyt);
        return back()->with("toast_success","Durum Değiştirme Başarılı");

    }

    public function isnew ($id){
        $status = ProductModel::select("isNew")->where("id",$id)->first();
        if ($status->isNew == "1") {
            $isNew = "0";
        } else {
            $isNew = "1";
        }
        $isNew = array("isNew"=>$isNew);
        ProductModel::where("id",$id)->update($isNew);
        return back()->with("toast_success","Durum Değiştirme Başarılı");
    }

    public function delete($id){

        $products = ProductModel::find($id);

        $destination = "app/admin/uploads/urunler/".$products->image;

        if (File::exists($destination)){

            File::delete($destination);

        }

        $products->delete();

        return back()->with("toast_success","Ürün Başarılı Bir Şekilde Silindi");

    }




}
