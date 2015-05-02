<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('business', function($table){
			$table->increments('id',true);

			$table->string('business',100);
			$table->text('address');
			$table->string('phone',30);
			$table->string('email',30);
			$table->boolean('active')->default(1);

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
		Schema::drop('business');
	}

}
