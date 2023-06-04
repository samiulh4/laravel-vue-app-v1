<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsWebListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_web_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('web_name', 100);
            $table->text('web_host');
            $table->string('web_port', 4)->nullable();
            $table->string('web_prefix', 10)->nullable();
            $table->tinyInteger('is_active')->nullable()->default(1);
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
        Schema::dropIfExists('jobs_web_list');
    }
}
