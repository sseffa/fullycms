<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('settings', function (Blueprint $table) {

            $table->increments('id');
            $table->string('site_title');
            $table->string('ga_code');
            $table->string('meta_title');
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
