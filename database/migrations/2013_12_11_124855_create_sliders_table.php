<?php

use Illuminate\Database\Migrations\Migration;

class CreateSlidersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('sliders', function ($table) {

            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('path', 255);
            $table->string('file_name', 255);
            $table->integer('file_size');
            $table->integer('order');
            $table->string('lang', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('sliders');
    }
}
