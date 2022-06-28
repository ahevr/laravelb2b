<?php
namespace App\Http\Traits;
use App\Helper\urlHelper;
use App\Models\Admin\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


trait ProductTrait {

    // Paginate olarak model getirir(DESC) //
    public function getDataPaginate($model){

        return $model::latest()->paginate(10);
    }

    // Model Getirir  //
    public function getData($model){

        return $model::all();

    }



}
