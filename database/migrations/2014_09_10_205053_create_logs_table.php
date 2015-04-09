<?php

use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('logs', function($table)
        {
            $table->increments('id');
            $table->string('php_sapi_name');
            $table->string('level');
            $table->text('message');
            $table->text('context');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {

        Schema::drop('logs');
    }
}
