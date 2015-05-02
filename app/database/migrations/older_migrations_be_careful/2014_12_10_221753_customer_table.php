<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CustomerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function($table){
			$table->increments('id', true);
			
			$table->string('name_customer', 100);
			$table->string('lastname_customer', 100);
			$table->string('phone_customer',30);
			$table->string('telefono2',30);
			$table->string('email',30);
			$table->boolean('active')->default(1);

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
		Schema::drop('customers');
	}

}
