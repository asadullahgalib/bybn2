<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversityPostgraduateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('university_postgraduate_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('university_id')->nullable();
            $table->string('name')->nullable();
            $table->string('bg_img_desktop')->nullable();
            $table->string('bg_img_mobile')->nullable();
            $table->string('bg_description')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('university_postgraduate_programs');
    }
}
