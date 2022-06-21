<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayicariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayicari', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("bayi_id");
            $table->string("fis_no");
            $table->string("desc");
            $table->string("vade_tarihi");
            $table->string("borc_tutari");
            $table->string("alacak_tutari");
            $table->string("borc_bakiye");
            $table->string("alacak_bakiye");
            $table->foreign('bayi_id')->references('id')->on('bayi')->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bayicari');
    }
}
