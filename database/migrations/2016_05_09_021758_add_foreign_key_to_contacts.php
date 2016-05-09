<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function(Blueprint $table)
        {
            $table->foreign('user_id', 'contacts_ibfk_1')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function(Blueprint $table)
        {
            $table->dropForeign('contacts_ibfk_1');
        });
    }
}
