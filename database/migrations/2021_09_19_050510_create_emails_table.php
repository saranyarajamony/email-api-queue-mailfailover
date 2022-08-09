<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateEmailsTable.
 */
class CreateEmailsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('emails', function(Blueprint $table) {
            $table->increments('id');
			$table->string('username'); // Ze: added field for DB
            $table->string('subject'); //Ze: added field for DB
			$table->string('content'); //Ze: added field for DB
			$table->string('to'); //Ze: added field for DB
			$table->string('from'); //Ze: added field for DB
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
		Schema::drop('emails');
	}
}
