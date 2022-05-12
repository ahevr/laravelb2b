<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("product_url",255)->nullable(true);
            $table->string("product_name",255)->nullable(true);
            $table->string("product_code",255)->nullable(true);
            $table->string("product_image",255)->nullable(true);
            $table->longText("product_desc")->nullable(true);
            $table->string("stock_status",255)->nullable(true);
            $table->string("stock_quantity",255)->nullable(true);
            $table->string("price",255)->nullable(true);
            $table->string("discount",255)->nullable(true);
            $table->string("tax",255)->nullable(true);
            $table->string("total_price",255)->nullable(true);
            $table->string("usage_area",255)->nullable(true);
            $table->string("kol_sayisi",255)->nullable(true);
            $table->string("material",255)->nullable(true);
            $table->string("width",255)->nullable(true);
            $table->string("height",255)->nullable(true);
            $table->string("length",255)->nullable(true);
            $table->string("kg",255)->nullable(true);
            $table->string("warranty_period",255)->nullable(true);
            $table->string("catalog_year",255)->nullable(true);
            $table->string("isActive",255)->nullable(true);
            $table->string("isNew",255)->nullable(true);
            $table->string("isFyt",255)->nullable(true);
            $table->integer("created_by")->nullable(true);
            $table->integer("update_by")->nullable(true);
            $table->integer("brand_id")->nullable(true);
            $table->integer("color_id")->nullable(true);
            $table->integer("bulb_id")->nullable(true);
            $table->integer("category_id")->nullable(true);
            $table->integer("duy_id")->nullable(true);
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
        Schema::dropIfExists('product');
    }
}
