<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('categories', function ($table) {

            $table->increments('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('lang', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('categories');
    }
}
