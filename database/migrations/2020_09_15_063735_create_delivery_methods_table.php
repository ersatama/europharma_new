<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\DeliveryMethod\DeliveryMethodContract;

class CreateDeliveryMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(DeliveryMethodContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(DeliveryMethodContract::CUSTOM_NAME)->nullable();
            $table->string(DeliveryMethodContract::NAME)->nullable();
            $table->string(DeliveryMethodContract::ENABLED);
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
        Schema::dropIfExists(DeliveryMethodContract::TABLE);
    }
}
