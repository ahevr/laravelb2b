<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\ProductModel;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CardController extends Controller
{
    public function index(){

        return view('app.site.page.card.index');
    }

    public function add(Request $request){

        $products = ProductModel::findOrFail($request->id);

        Cart::instance('shopping')->add(
            $products->id, $products->product_name, 1,$products->total_price, 0,[
                "image"=>$products->image,
                "stock_quantity" => $products->stock_quantity,
                "color"=>$products->color,
                "category_id"=>$products->category->name,
                "product_url"=>$products->product_url,
           ]);

        return redirect()->back()->with('toast_success','Ürün sepete eklendi.');
    }

    public function delete($rowid){

        Cart::instance('shopping')->remove($rowid);

        return  redirect()->back()->with("toast_success","Sepet Güncellendi");

    }

    public function update($rowid){

        Cart::instance('shopping')->update($rowid,\request("qty"));

        return response()->json(["success"=>true]);

    }


}
