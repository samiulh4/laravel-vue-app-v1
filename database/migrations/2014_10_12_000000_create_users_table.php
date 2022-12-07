<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('email', 100)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->integer('user_type_id')->unsigned()->default(1);
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('access_portal')->default(1)->comment('1=Web, 2=Web & Admin');
            $table->string('phone_no', 20)->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->string('national_id', 20)->nullable();
            $table->string('passport_no', 20)->nullable();
            $table->string('photo', 255)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('created_by')->unsigned()->nullable();
            $table->bigInteger('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('users');
    }
}
