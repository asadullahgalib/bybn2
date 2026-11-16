<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('university_id')->nullable();
            $table->string('type')->nullable();
            $table->string('level')->nullable();
            $table->string('intake')->nullable();
            $table->string('ielts')->nullable();
            $table->string('duration')->nullable();
            $table->string('scholarship_availability')->nullable();
            $table->string('home_fees')->nullable();
            $table->string('international_fees')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
