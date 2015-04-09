<?php

use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('videos', function ($table) {

            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug')->nullable();
            $table->string('video_id', 255);
            $table->string('type', 10);
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

        Schema::drop('videos');
    }
}
