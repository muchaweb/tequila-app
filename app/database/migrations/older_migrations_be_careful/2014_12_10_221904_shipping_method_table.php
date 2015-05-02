<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShippingMethodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shipping_methods', function($table){
			$table->increments('id', true);
			
			$table->string('shipping_method', 100);
			$table->text('description');
			$table->decimal('cost', 5,2);
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
		Schema::drop('shipping_methods');
	}

}
