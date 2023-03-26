<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsDataMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_data_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('qualification')->nullable();
            $table->date('published_on')->nullable();
            $table->date('date_line')->nullable();
            $table->string('vacancy_number')->nullable();
            $table->string('salary',100)->nullable();
            $table->bigInteger('job_nature_id')->unsigned()->nullable();
            $table->string('location', 255)->nullable();
            $table->bigInteger('job_country_id')->unsigned()->nullable();
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
        Schema::dropIfExists('jobs_data_master');
    }
}
