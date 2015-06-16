<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
            $table->timestamp('logged_in_at');
            $table->timestamp('logged_out_at');
            $table->binary('ip_address');
            $table->string('picture');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('logged_in_at');
            $table->dropColumn('logged_out_at');
            $table->dropColumn('ip_address');
            $table->dropColumn('picture');
        });
	}

}
