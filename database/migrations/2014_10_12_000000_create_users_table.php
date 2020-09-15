<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Contracts\User\UserContract;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(UserContract::TABLE, function (Blueprint $table) {
            $table->id();
            $table->enum(UserContract::STATUS,UserContract::STATUS_VALUES)->default(UserContract::USER);
            $table->string(UserContract::NAME);
            $table->enum(UserContract::GENDER,UserContract::GENDER_VALUES)->default(UserContract::EMPTY);
            $table->date(UserContract::BIRTHDATE)->useCurrent();
            $table->string(UserContract::PHONE)->unique();
            $table->timestamp(UserContract::PHONE_VERIFIED_AT)->nullable();
            $table->string(UserContract::PHONE_CODE);
            $table->string(UserContract::EMAIL)->unique()->nullable();
            $table->timestamp(UserContract::EMAIL_VERIFIED_AT)->nullable();
            $table->string(UserContract::PASSWORD);
            $table->enum(UserContract::EMAIL_NOTIFICATION,UserContract::EMAIL_NOTIFICATION_VALUES)->default(UserContract::ENABLED);
            $table->enum(UserContract::PUSH_NOTIFICATION,UserContract::PHONE_NOTIFICATION_VALUES)->default(UserContract::ENABLED);
            $table->rememberToken();
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
        Schema::dropIfExists(UserContract::TABLE);
    }
}
