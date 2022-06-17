<?php

namespace App\Models;

use App\Models\Admin\ProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    protected $table = "order_detail";

    protected $guarded = [];

    public function product(){

        return $this->belongsTo(ProductModel::class);
    }

    public function order(){

        return $this->belongsTo(OrderModel::class);
    }
    public function bayi(){

        return $this->belongsTo(Bayi::class);
    }
}
