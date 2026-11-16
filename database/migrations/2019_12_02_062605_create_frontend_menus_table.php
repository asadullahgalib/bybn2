<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrontendMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rand_id')->nullable();
            $table->string('title_en')->nullable();
            $table->integer('sort_order')->default(0)->nullable();
            $table->string('url_link')->nullable();
            $table->string('url_link_type')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('parent_id')->nullable();
            $table->string('target')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('modified_by')->nullable();
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
        Schema::dropIfExists('frontend_menus');
    }
}
