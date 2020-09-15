<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\DeliveryMethodList\DeliveryMethodListContract;

class CreateDeliveryMethodListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DeliveryMethodListContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(DeliveryMethodListContract::LIST_ID);
            $table->bigInteger(DeliveryMethodListContract::CITY_ID);
            $table->bigInteger(DeliveryMethodListContract::MIN_PRICE);
            $table->bigInteger(DeliveryMethodListContract::MAX_PRICE);
            $table->smallInteger(DeliveryMethodListContract::ENABLED);
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
        Schema::dropIfExists(DeliveryMethodListContract::TABLE);
    }
}
