<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function($table){
			$table->increments('id', true);

			$table->integer('id_product_fk')->unsigned();
			
			$table->string('title', 100);
			$table->string('path_image',400)->default('');
			$table->boolean('active')->default(1);
			$table->integer('ordering');

			$table->timestamps();
		});

		Schema::table('images', function($table){
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
		Schema::drop('images');
	}

}
