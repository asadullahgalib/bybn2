<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('country_id')->nullable();
            $table->string('name')->nullable();
            $table->string('logo_img')->nullable();
            $table->string('graph_img')->nullable();
            $table->longText('description_en')->nullable();
            $table->string('location')->nullable();
            $table->string('ranking')->nullable();
            $table->string('international_student')->nullable();
            $table->string('study_option')->nullable();
            $table->string('intakes')->nullable();
            $table->string('scholarship')->nullable();
            $table->string('gallery_img1')->nullable();
            $table->string('gallery_img2')->nullable();
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
        Schema::dropIfExists('universities');
    }
}
