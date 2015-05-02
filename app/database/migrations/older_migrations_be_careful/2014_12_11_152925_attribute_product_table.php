<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AttributeProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attribute_product', function($table){
			$table->increments('id', true);

			$table->integer('id_product_fk')->unsigned();
			
			$table->integer('bottles_box');
			$table->integer('custom_range');
			$table->integer('repeat');

			$table->timestamps();
		});

		Schema::table('attribute_product', function($table){
			$table->foreign('id_product_fk')
				  ->references('id')
				  ->on('products')
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
		Schema::drop('attribute_product');
	}

}
