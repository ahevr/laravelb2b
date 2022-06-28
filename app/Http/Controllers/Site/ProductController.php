<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoriesModel;
use App\Models\Admin\ProductModel;
use App\Models\Admin\SlickModel;
use App\Models\Bayi;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $productGetAll = ProductModel::IsActive();
        $categories    = CategoriesModel::where('parent_id', 0)->get();
        $productCount  = ProductModel::count();


        switch (strip_tags(trim(request('sort')))) {
            case 'price_lowest':
                $productGetAll->orderBy("total_price", "Asc");
                break;
            case 'price_highest':
                $productGetAll->orderBy("total_price", "Desc");
                break;
            case 'a_to_z':
                $productGetAll->orderBy("id", "Asc");
                break;
            case 'z_to_a':
                $productGetAll->orderBy("id", "DESC");
                break;
            default:
                $productGetAll->orderBy("id", "DESC");
                break;
        }

        $productGetAll = $productGetAll->orderBy("id","Desc")->paginate(15);


        return view("app.site.page.product.index")
            ->with("productGetAll",$productGetAll)
            ->with("categories",$categories)
            ->with("productCount",$productCount);
    }

    public function detail($url){

        $slick  = SlickModel::all();

        $productDetailGet = ProductModel::where("product_url",$url)->IsActive()->firstOrFail();

        $randomProductGet = ProductModel::inRandomOrder()->isactive()->limit(4)->get();

        $categories    = CategoriesModel::where('parent_id', 0)->get();

        return view("app.site.page.product.detail")
            ->with("productDetailGet",$productDetailGet)
            ->with("randomProductGet",$randomProductGet)
            ->with("categories",$categories)
            ->with("slick",$slick);
    }





}
