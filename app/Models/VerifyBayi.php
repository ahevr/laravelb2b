<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyBayi extends Model
{

    public $table = "verify_bayi";

    protected $guarded = [];

    public function bayi(){

        return $this->belongsTo(Bayi::class);

    }

}
