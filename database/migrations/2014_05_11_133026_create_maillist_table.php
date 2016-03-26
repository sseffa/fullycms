<?php

use Illuminate\Database\Migrations\Migration;

class CreateMaillistTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('maillist', function ($table) {

            $table->increments('id');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('maillist');
    }
}
