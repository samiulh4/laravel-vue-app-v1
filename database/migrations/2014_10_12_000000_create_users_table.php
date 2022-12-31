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
            $table->string('username', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('user_type_id')->unsigned()->default(1);
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('access_portal')->default(1)->comment('1=Web, 2=Web & Admin');
            $table->string('phone_no', 20)->nullable();
            $table->string('mobile_no', 20)->nullable();
            $table->string('national_id', 20)->nullable();
            $table->string('passport_no', 20)->nullable();
            $table->string('photo', 255)->nullable();
            $table->date('date_of_birth')->nullable();

            $table->integer('provider_type_id')->unsigned()->nullable()->default(0);
            $table->string('provider_id', 255)->nullable();
            $table->string('provider_token', 255)->nullable();
            $table->string('provider_refresh_token', 255)->nullable();
            $table->dateTime('provider_expiry')->nullable();


            $table->string('cv_pdf_link', 255)->nullable();
            $table->string('bio_pdf_link', 255)->nullable();

            $table->rememberToken();
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
