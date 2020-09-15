<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\Stock\StockContract;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(StockContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(StockContract::PRODUCT_ID)->nullable();
            $table->bigInteger(StockContract::CITY_ID)->nullable();
            $table->bigInteger(StockContract::PRICE)->nullable();
            $table->bigInteger(StockContract::SUB_PRICE)->nullable();
            $table->bigInteger(StockContract::PRICE_SPECIAL)->nullable();
            $table->bigInteger(StockContract::QUANTITY)->nullable();
            $table->string(StockContract::CHANGED_AT)->nullable();
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
        Schema::dropIfExists(StockContract::TABLE);
    }
}
