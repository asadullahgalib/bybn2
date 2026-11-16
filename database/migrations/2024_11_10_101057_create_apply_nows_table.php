<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyNowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_nows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('country')->nullable();
            $table->string('course')->nullable();
            $table->integer('contact_details_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('university_id')->nullable();
            $table->longText('study_area')->nullable();
            $table->longText('msg')->nullable();
            $table->string('passport')->nullable();
            $table->string('reference_letter')->nullable();
            $table->string('certificate')->nullable();
            $table->string('personal_statement')->nullable();
            $table->string('cv')->nullable();
            $table->string('other_document')->nullable();
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('apply_nows');
    }
}
