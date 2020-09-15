<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\Category\CategoryContract;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(CategoryContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->smallInteger(CategoryContract::PARENT_ID)->nullable();
            $table->smallInteger(CategoryContract::SORT)->nullable();
            $table->string(CategoryContract::CUSTOM_NAME)->nullable();
            $table->string(CategoryContract::NAME)->nullable();
            $table->string(CategoryContract::ENABLED)->nullable();
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
        Schema::dropIfExists(CategoryContract::TABLE);
    }
}
