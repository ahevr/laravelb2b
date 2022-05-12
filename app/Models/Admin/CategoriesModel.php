<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    protected $table = "category";

    protected $guarded = [];

    public function childs() {

        return $this->hasMany(CategoriesModel::class,'parent_id','id') ;

    }
}
