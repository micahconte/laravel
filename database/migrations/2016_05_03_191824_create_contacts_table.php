<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('subscriber_id')->unsigned()->unique();
            $table->string('name');
            $table->string('surname');
            $table->string('email')->index();
            $table->string('phone');
            $table->string('custom1');
            $table->string('custom2');
            $table->string('custom3');
            $table->string('custom4');
            $table->string('custom5');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contacts');
    }
}
