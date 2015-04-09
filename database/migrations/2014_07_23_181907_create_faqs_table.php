<?php

use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('faqs', function ($table) {

            $table->increments('id');
            $table->string('question');
            $table->text('answer');
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
	public function down()
	{
        Schema::drop('faqs');
	}

}
