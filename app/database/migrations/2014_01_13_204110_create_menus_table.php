<?php

use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('menus', function ($table) {

            $table->increments('id');
            $table->string('title', 255);
            $table->string('url', 255);
            $table->integer('order');
            $table->integer('parent_id');
            $table->string('type', 10);
            $table->string('option', 255)->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('menus');
    }
}
