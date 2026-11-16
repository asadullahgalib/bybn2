<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidelineDescriptionFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guideline_description_faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('guideline_description_id')->nullable();
            $table->string('serial')->nullable();
            $table->string('question')->nullable();
            $table->longText('answer')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('guideline_description_faqs');
    }
}
