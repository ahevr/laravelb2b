<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\ProductModel;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {

        if (strip_tags(trim(\request("q") != ""))) {

            $productCount = ProductModel::count();
            $catGet = CategoriesModel::all();
            $categories = CategoriesModel::where('parent_id', '=', 0)->get();
            $keyword = strip_tags(trim(\request("q")));
            $productGetAll = ProductModel::where("product_name", "like", "%" . $keyword . "%")->where('isActive', 1)->paginate(15);
            if (count($productGetAll) > 0) {

                return view("app.site.page.product.index")
                    ->with("productGetAll", $productGetAll)
                    ->with("categories", $categories)
                    ->with("productCount", $productCount)
                    ->with("catGet", $catGet);

            } else {

                return view("errors.404");
            }

        } else {

            return redirect("/")->with("toast_warning", "Lütfen Bir Arama Yapınız");

        }
    }
}
