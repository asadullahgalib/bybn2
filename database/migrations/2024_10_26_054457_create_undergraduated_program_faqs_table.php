<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUndergraduatedProgramFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('undergraduated_program_faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('university_undergraduate_program_id')->nullable();
            $table->string('serial')->nullable();
            $table->string('question')->nullable();
            $table->longText('answer')->nullable();
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
        Schema::dropIfExists('undergraduated_program_faqs');
    }
}
