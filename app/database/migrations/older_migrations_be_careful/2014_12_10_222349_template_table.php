<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TemplateTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('templates', function($table){
			$table->increments('id', true);

			$table->integer('id_email_fk')->unsigned();
			
			$table->string('subject', 100);
			$table->text('template');
			$table->boolean('active')->default(1);
			$table->integer('ordering');

			$table->timestamps();
		});

		Schema::table('templates', function($table){
			$table->foreign('id_email_fk')
				  ->references('id')
				  ->on('emails')
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
		Schema::drop('templates');
	}

}
