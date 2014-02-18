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
            $table->string('site_title');
            $table->string('ga_code');
            $table->string('meta_keywords');
            $table->string('meta_description');
            $table->timestamps();
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
