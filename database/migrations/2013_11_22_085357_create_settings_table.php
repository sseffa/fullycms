<?php

use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('settings', function ($table) {

            $table->increments('id');
            $table->text('settings');
            $table->timestamps();
            $table->string('lang', 20);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('settings');
    }
}
