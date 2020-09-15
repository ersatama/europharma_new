<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\PaymentMethodList\PaymentMethodListContract;

class CreatePaymentMethodListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PaymentMethodListContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(PaymentMethodListContract::LIST_ID);
            $table->bigInteger(PaymentMethodListContract::CITY_ID);
            $table->bigInteger(PaymentMethodListContract::DELIVERY_ID);
            $table->smallInteger(PaymentMethodListContract::ENABLED);
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
        Schema::dropIfExists(PaymentMethodListContract::TABLE);
    }
}
