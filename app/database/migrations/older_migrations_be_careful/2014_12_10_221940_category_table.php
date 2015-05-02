<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category', function($table){
			$table->increments('id', true);
			
			$table->string('category', 100);
			$table->integer('parent_category');
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
		Schema::drop('category');
	}

}
