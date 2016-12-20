<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCondominiumTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_condominium', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('user_role_condominium_id')->unsigned();
			$table->foreign('user_role_condominium_id')->references('id')->on('user_role_condominium');
			$table->integer('condominium_id')->unsigned();
			$table->foreign('condominium_id')->references('id')->on('condominium');
			$table->enum('active', ['y', 'n'])->default('n');
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
		Schema::drop('user_condominium');
	}

}
