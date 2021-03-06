<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUnitTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_unit', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_condominium_id')->unsigned();
			$table->foreign('user_condominium_id')->references('id')->on('user_condominium');
			$table->integer('unit_id')->unsigned();
			$table->foreign('unit_id')->references('id')->on('unit');
			$table->integer('user_unit_role_id')->unsigned();
			$table->foreign('user_unit_role_id')->references('id')->on('user_unit_role');
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
		Schema::drop('user_unit');
	}

}
