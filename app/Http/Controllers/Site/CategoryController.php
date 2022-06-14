<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\ProductModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index($url){

        $categoriGetAll = CategoriesModel::all();

        $categoriess = CategoriesModel::where("url",$url)->firstOrFail();

        $product  = ProductModel::whereIn("category_id",$categoriess)->IsActive()->paginate(15);

        $categories  = CategoriesModel::where('parent_id', '=', 0)->get();

        $productCount = ProductModel::count();


//        switch (strip_tags(trim(request('sort')))) {
//            case 'price_lowest':
//                $product->orderBy("total_price", "Asc");
//                break;
//            case 'price_highest':
//                $product->orderBy("total_price", "Desc");
//                break;
//            case 'a_to_z':
//                $product->orderBy("id", "Asc");
//                break;
//            case 'z_to_a':
//                $product->orderBy("id", "DESC");
//                break;
//            default:
//                $product->orderBy("id", "DESC");
//                break;
//        }





        return view("app.site.page.kategoriler.index")
            ->with("product",$product)
            ->with("categories",$categories)
            ->with("productCount",$productCount)
            ->with("categoriess",$categoriess)
            ->with("categoriGetAll",$categoriGetAll);


    }


}
