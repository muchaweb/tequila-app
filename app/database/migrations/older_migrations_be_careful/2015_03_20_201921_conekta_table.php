<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConektaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conekta', function($table){
			$table->increments('id', true);

			$table->integer('id_payment_method_fk')->unsigned();
			
			$table->text('public_key');
			$table->text('private_key');

			$table->timestamps();
		});

		Schema::table('conekta', function($table){
			$table->foreign('id_payment_method_fk')
				  ->references('id')
				  ->on('payment_methods')
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
		Schema::drop('conekta');
	}

}
