<?php

namespace App\Models;

use App\Models\Admin\ProductModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = "order";

    protected $guarded = [];

    public function bayi(){

        return $this->belongsTo(Bayi::class);
    }

    public function product(){

        return $this->belongsTo(ProductModel::class);
    }

}
