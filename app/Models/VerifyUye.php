<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyUye extends Model
{

    public $table = "verify_uye";

    protected $guarded = [];

    public function uye(){

        return $this->belongsTo(Uye::class);

    }

}
