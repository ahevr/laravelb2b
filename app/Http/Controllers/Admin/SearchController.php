<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        if (strip_tags(trim(request()->get('q')!=""))){
            $q = strip_tags(trim(request()->get("q")));
            $products = ProductModel::where("product_name","like","%".$q."%")
                ->orWhere("product_code","like","%".$q."%")
                ->paginate(5);
            if (count($products) > 0){
                return view("app.admin.page.products.index")
                    ->with("products",$products)
                    ->with("success","Arama Sonuçları");
            } else {
                return view("errors.404");
            }
        } else {
            return redirect("/admin/products")->with("toast_warning","Lütfen Bir Arama Yapınız");
        }
    }
}
