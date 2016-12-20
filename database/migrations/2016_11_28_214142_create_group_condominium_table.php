<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupCondominiumTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_condominium', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('condominium_id')->unsigned();
			$table->foreign('condominium_id')->references('id')->on('condominium');
			$table->string('name');
			$table->enum('active', ['y','n'])->default('n');
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
		Schema::drop('group_condominium');
	}

}
