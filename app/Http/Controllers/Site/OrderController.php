<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Admin\CategoriesModel;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function index(){

        return view('app.site.page.order.index');
    }

    public function add(Request $request){

        $request->validate([
            'adi'=>'required','soyadi'=>'required','email'=> 'required', 'il'=> 'required', 'ilce'=> 'required', 'adres'=>'required','telefon'=>'required|digits:12|numeric',
        ]);

                $isk1 = Cart::instance('shopping')->totalFloat() * Auth::guard("bayi")->user()->bayi_isk1 / 100 ;
                $isk2 = Cart::instance('shopping')->totalFloat() - $isk1;
                $indirimHesapla2 = $isk2 * Auth::guard("bayi")->user()->bayi_isk2 / 100 ;
                $genelToplam2 = $isk2 - $indirimHesapla2;


        $input = $request->all();
        $input["order_no"] = rand(100000000,999999999);
        $input["bayi_id"] = Auth::guard("bayi")->id();
        $input["total_price"]  = $genelToplam2;
        OrderModel::create($input);

        if ($input){

            $sonid = OrderModel::all()->last()->id;

            foreach (Cart::instance('shopping')->content() as $cartItem){
                $input2 = [
                    "product_id"    => $cartItem->id,
                    "adet"          => $cartItem->qty,
                    "fiyat"         => $cartItem->subtotal,
                    "image"         => $cartItem->options->image,
                    "stock_quantity"     => $cartItem->options->stock_quantity,
                    "bayi_id"       => Auth::guard("bayi")->id(),
                    "order_id"      => $sonid,
                    "category_id"      => $cartItem->options->category_id,
                ];
                OrderDetailModel::create($input2);
            }
            Cart::destroy();

            return  redirect()->back()->with("toast_success","Sipariş Başarılı Bir Şekilde Tamamlandı");

        }

    }

    public function siparisDashboard($id){

        $sip  = OrderModel::where("bayi_id",$id)->get();

        $data = OrderModel::where("bayi_id",$id)->first();

        $categories = CategoriesModel::where('parent_id', '=', 0)->get();

        return view("app.site.page.siparisler.index")
            ->with("sip",$sip)
            ->with("data",$data)
            ->with("categories",$categories);

    }

    public function siparisDetayDashboard($id){

        $data = OrderModel::where("id",$id)->get();

        $sip  = OrderDetailModel::where("order_id",$id)->get();

        $categories = CategoriesModel::where('parent_id', '=', 0)->get();

        return view("app.site.page.siparisler.detail")
            ->with("sip",$sip)
            ->with("data",$data)
            ->with("categories",$categories);

    }



}
