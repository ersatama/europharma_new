<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\PaymentMethod\PaymentMethodContract;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PaymentMethodContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(PaymentMethodContract::CUSTOM_NAME)->nullable();
            $table->string(PaymentMethodContract::NAME)->nullable();
            $table->string(PaymentMethodContract::ENABLED);
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
        Schema::dropIfExists(PaymentMethodContract::TABLE);
    }
}
