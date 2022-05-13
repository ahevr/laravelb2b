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

    public function scopeIsActive($query){

        return $query->where("isActive",1);

    }

    public function setImageAttribute($value){

        if($value) {
            $file =$value;
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('app/admin/uploads/urunler/', $filename);
            $this->attributes['image'] = $filename;

        }
    }

}
