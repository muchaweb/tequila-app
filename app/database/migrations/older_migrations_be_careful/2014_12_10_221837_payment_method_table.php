<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaymentMethodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_methods', function($table){
			$table->increments('id', true);
			
			$table->string('payment_method', 100);
			$table->text('description');
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
		Schema::drop('payment_methods');
	}

}
