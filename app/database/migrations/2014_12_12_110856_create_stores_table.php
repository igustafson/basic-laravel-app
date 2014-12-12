<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stores', function($table)
		{
			$table->increments('id');
			$table->integer('company_id')->unsigned()->nullable();
			$table->foreign('company_id')->references('id')->on('companies');
			$table->string('nickname')->nullable();
			$table->string('address');
			$table->string('postal_code', 36);
			$table->string('city', 64);
			$table->string('state', 3);
			$table->string('latitude', 64);
			$table->string('longitude', 64);
			$table->string('timezone', 64);
			$table->string('phone', 36);
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
		Schema::drop('stores');
	}

}
