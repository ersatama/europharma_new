<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\City\CityContract;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CityContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->string(CityContract::NAME)->nullable();
            $table->string(CityContract::SLUG)->nullable();
            $table->string(CityContract::LAT)->nullable();
            $table->string(CityContract::LNG)->nullable();
            $table->string(CityContract::CODE)->nullable();
            $table->string(CityContract::NUMBER)->nullable();
            $table->string(CityContract::ENABLED)->nullable();
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
        Schema::dropIfExists(CityContract::TABLE);
    }
}
