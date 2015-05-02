<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShippingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shippings', function($table){
			$table->increments('id', true);

			$table->integer('id_customer_fk')->unsigned();
			
			$table->string('street', 200);
			$table->string('number', 7);
			$table->string('reference', 200);
			$table->string('zip_code', 7);
			$table->string('city', 100);
			$table->string('state', 100);
			$table->string('country', 100);

			$table->timestamps();
		});

		Schema::table('shippings', function($table){
			$table->foreign('id_customer_fk')
				  ->references('id')
				  ->on('customers')
				  ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shippings');
	}

}
