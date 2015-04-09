<?php

use Illuminate\Database\Migrations\Migration;

class CreateFormPostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('form_posts', function ($table) {

            $table->increments('id');
            $table->string('sender_name_surname', 255);
            $table->string('sender_email', 255);
            $table->string('sender_phone_number', 255);
            $table->string('subject', 255);
            $table->text('message');
            $table->string('created_ip', 15);
            $table->boolean('is_answered')->default(false);
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

        Schema::drop('form_posts');
    }
}
