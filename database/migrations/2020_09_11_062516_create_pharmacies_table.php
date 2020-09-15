<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\Pharmacy\PharmacyContract;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(PharmacyContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->bigInteger(PharmacyContract::NUMBER);
            $table->bigInteger(PharmacyContract::CITY_ID)->nullable();
            $table->string(PharmacyContract::CUSTOM_NAME)->nullable();
            $table->string(PharmacyContract::NAME)->nullable();
            $table->text(PharmacyContract::ADDRESS)->nullable();
            $table->string(PharmacyContract::WORKING_TIME)->nullable();
            $table->string(PharmacyContract::LAT)->nullable();
            $table->string(PharmacyContract::LNG)->nullable();
            $table->string(PharmacyContract::ENABLED)->nullable();
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
        Schema::dropIfExists(PharmacyContract::TABLE);
    }
}
