<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id', true);

			$table->integer('id_rol_fk')->unsigned();
			
			$table->string('name', 100);
			$table->string('lastname', 100);
			$table->string('nickname',100);
			$table->string('phone',30);
			$table->string('email',30);
			$table->string('puesto',100);
			$table->string('password',100);
			$table->boolean('active')->default(1);
			$table->integer('ordering');
			$table->string('remember_token', 100)->nullable();

			$table->timestamps();
		});

		Schema::table('users', function($table){
			$table->foreign('id_rol_fk')
				  ->references('id')
				  ->on('roles')
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
		Schema::drop('users');
	}

}
