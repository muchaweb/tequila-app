<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table){
			$table->increments('id', true);

			$table->integer('id_label_fk')->unsigned();
			$table->integer('id_currency_fk')->unsigned();
			
			$table->string('product', 100);
			$table->text('description');
			$table->decimal('price', 5,2);
			$table->boolean('active')->default(1);
			$table->integer('ordering');

			$table->timestamps();
		});

		Schema::table('products', function($table){
			$table->foreign('id_label_fk')
				  ->references('id')
				  ->on('labels')
				  ->onDelete('cascade');
		});

		Schema::table('products', function($table){
			$table->foreign('id_currency_fk')
				  ->references('id')
				  ->on('currencies')
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
		Schema::drop('currencies');
	}

}
