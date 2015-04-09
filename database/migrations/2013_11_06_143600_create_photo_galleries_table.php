<?php

use Illuminate\Database\Migrations\Migration;

class CreatePhotoGalleriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('photo_galleries', function ($table) {

            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug')->nullable();
            $table->text('content');
            $table->timestamps();
            $table->boolean('is_published')->default(true);
            $table->string('lang', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

         Schema::drop('photo_galleries');
    }
}
