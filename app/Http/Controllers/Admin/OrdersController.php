<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetailModel;
use App\Models\OrderModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){

        $orders = OrderModel::latest()->paginate(10);
        return view('app.admin.page.orders.index')
            ->with('orders',$orders);
    }

    public function detail($id){

        $orders = OrderModel::findOrFail($id);

        $sip  = OrderDetailModel::where("order_id",$id)->get();

        return view('app.admin.page.orders.detail')
            ->with('orders',$orders)
            ->with('sip',$sip);

    }

    public function downloadPDF($id){

        $orders = OrderModel::findOrFail($id);

        $sip  = OrderDetailModel::where("order_id",$id)->get();

        $pdf = PDF::loadView('app.admin.page.orders.pdf',compact('orders','sip'));

        return $pdf->download("SiparişNo: #SDF-".$orders->order_no."-".date("Y").".pdf");

    }

}
