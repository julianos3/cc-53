<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unit', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('condominium_id')->unsigned();
			$table->foreign('condominium_id')->references('id')->on('condominium');
			$table->integer('block_id')->unsigned();
			$table->foreign('block_id')->references('id')->on('block');
			$table->integer('unit_type_id')->unsigned();
			$table->foreign('unit_type_id')->references('id')->on('unit_type');
			$table->integer('unit_id');
			$table->string('name');
			$table->string('floor')->nullable();
			$table->text('description')->nullable();
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
		Schema::drop('unit');
	}

}
