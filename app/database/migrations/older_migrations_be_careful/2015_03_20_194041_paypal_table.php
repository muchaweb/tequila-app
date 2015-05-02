<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PaypalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paypal', function($table){
			$table->increments('id', true);

			$table->integer('id_payment_method_fk')->unsigned();
			
			$table->text('cancel_url');
			$table->text('success_url');
			$table->string('username', 100);
			$table->string('password', 100);
			$table->string('signature', 100);
			$table->boolean('sandbox')->default(1);

			$table->timestamps();
		});

		Schema::table('paypal', function($table){
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
		Schema::drop('paypal');
	}

}
