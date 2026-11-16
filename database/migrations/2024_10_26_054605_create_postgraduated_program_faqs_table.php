<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostgraduatedProgramFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postgraduated_program_faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('university_postgraduate_program_id')->nullable();
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
        Schema::dropIfExists('postgraduated_program_faqs');
    }
}
