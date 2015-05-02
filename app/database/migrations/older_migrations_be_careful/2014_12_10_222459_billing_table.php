<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BillingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('billings', function($table){
			$table->increments('id', true);

			$table->integer('id_customer_fk')->unsigned();
			
			$table->string('street_billing', 200);
			$table->string('number_billing', 7);
			$table->string('reference_billing', 200);
			$table->string('zip_code_billing', 7);
			$table->string('city_billing', 100);
			$table->string('state_billing', 100);
			$table->string('country_billing', 100);

			$table->timestamps();
		});

		Schema::table('billings', function($table){
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
		Schema::drop('billing');
	}

}
