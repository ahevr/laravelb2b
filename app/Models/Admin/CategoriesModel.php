<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = "category";

    protected $guarded = [];

    //hangi kategoriden kaç tane var//

    public function category_id(){

        return $this->hasMany(ProductModel::class, 'category_id', 'id');

    }


    public function childs() {

        return $this->hasMany(CategoriesModel::class,'parent_id','id') ;

    }
}
