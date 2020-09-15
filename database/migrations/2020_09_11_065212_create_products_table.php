<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\Product\ProductContract;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(ProductContract::ITEM_ID)->nullable();
            $table->bigInteger(ProductContract::CATEGORY_ID)->nullable();
            $table->string(ProductContract::CUSTOM_NAME)->nullable();
            $table->string(ProductContract::NAME)->nullable();
            $table->bigInteger(ProductContract::SKU)->nullable();
            $table->string(ProductContract::BRAND)->nullable();
            $table->bigInteger(ProductContract::RECIPE)->nullable();
            $table->bigInteger(ProductContract::SPECIAL)->nullable();
            $table->bigInteger(ProductContract::ENABLED)->nullable();
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
        Schema::dropIfExists(ProductContract::TABLE);
    }
}
