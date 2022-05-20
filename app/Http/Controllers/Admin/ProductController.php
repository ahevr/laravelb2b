<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Helper\urlHelper;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\ProductModel;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\ProductTrait;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    function __construct(){

        $this->middleware('permission:products-list|products-create|products-edit|products-delete', ['only' => ['products.index','products.store']]);
        $this->middleware('permission:products-create', ['only' => ['products.create','products.store']]);
        $this->middleware('permission:products-edit', ['only' => ['products.edit','products.update']]);
        $this->middleware('permission:products-all-delete', ['only' => ['products.deleteproductsAll']]);
        $this->middleware('permission:deleteproducts', ['only' => ['products.deleteproducts']]);
    }

    use ProductTrait;

    public function index(){

    $products = ProductModel::orderBy("id","DESC")->paginate(10);
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
        $products->fill($request->all());
        $products->product_url     = urlHelper::permalink($request->product_name);
        $products->isActive        = 1;
        $products->isNew           = 1;
        $products->isFyt           = 1;
        $products->created_by      = Auth::guard("web")->id();
        $products->update_by       = 0;

        if($request->hasfile('image')) :
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('app/admin/uploads/urunler/', $filename);
            $products->image = $filename;

        endif;

        $products->save();

        return redirect("admin/products")->with("toast_success","$request->product_name". " Adlı Ürün Başarılı Bir Şekilde Eklendi");

    }

    public function edit($id){

        $categories = CategoriesModel::all();

        $product = ProductModel::findOrFail($id);

        return view("app.admin.page.products.update")
            ->with("categories",$categories)
            ->with("product",$product);

    }

    public function update(Request $request , $id){

        $products = ProductModel::findOrFail($id);

        $products->fill($request->all());
        $products->product_url = urlHelper::permalink($request->product_name);
        $products->update_by   = Auth::guard("web")->id();

        if($request->hasfile('image')) :
            $file = $request->file('image');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('app/admin/uploads/urunler/', $filename);
            $products->image = $filename;
        endif;

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

        $products = ProductModel::findOrFail($id);

        $destination = "app/admin/uploads/urunler/".$products->image;

        if (File::exists($destination)){

            File::delete($destination);

        }

        $products->delete();

        return back()->with("toast_success","Ürün Başarılı Bir Şekilde Silindi");

    }

    public function fileExport(){

        return Excel::download(new ProductExport, 'users-collection.xlsx');
    }

    public function fileImport(Request $request){

        Excel::import(new ProductImport,request()->file('file'));
        return back();
    }

    public function deleteAll(){

        ProductModel::truncate();
        return back();

    }

}
