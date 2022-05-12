<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = "product";

    protected $guarded = [];

    public function category(){

        return $this->belongsTo(CategoriesModel::class);

    }
}
