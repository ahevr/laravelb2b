<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = "order";

    protected $guarded = [];

    public function bayi(){

        return $this->belongsTo(Bayi::class);
    }

}
