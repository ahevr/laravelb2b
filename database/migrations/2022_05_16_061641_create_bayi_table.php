<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBayiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bayi', function (Blueprint $table) {
            $table->id();
            $table->string('bayi_adi');
            $table->string('bayi_kodu');
            $table->string('bayi_plasiyeri');
            $table->string('bayi_telefon');
            $table->string('bayi_email')->unique();
            $table->string('bayi_password');
            $table->string('bayi_il');
            $table->string('bayi_ilce');
            $table->string('bayi_adres');
            $table->string('bayi_isk1');
            $table->string('bayi_isk2');
            $table->string('bayi_isk3');
            $table->string('bayi_kdv');
            $table->rememberToken();
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
        Schema::dropIfExists('bayi');
    }
}
