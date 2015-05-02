<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeoProductTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seo_products', function($table){
			$table->increments('id', true);

			$table->integer('id_product_fk')->unsigned();
			
			$table->integer('title_seo');
			$table->text('description_seo');
			$table->text('keywords_seo');

			$table->timestamps();
		});

		Schema::table('seo_products', function($table){
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
		Schema::drop('seo_products');
	}

}
