<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\Brand\BrandContract;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(BrandContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->char(BrandContract::CODE,BrandContract::CODE_LENGTH);
            $table->string(BrandContract::TITLE);
            $table->string(BrandContract::LOGO);
            $table->bigInteger(BrandContract::ORDER);
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
        Schema::dropIfExists(BrandContract::TABLE);
    }
}
