<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CurrencyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('currencies', function($table){
			$table->increments('id', true);
			
			$table->string('currency', 100);
			$table->string('prefix', 5);
			$table->boolean('active')->default(1);
			$table->integer('ordering');

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
		Schema::drop('currency');
	}

}
