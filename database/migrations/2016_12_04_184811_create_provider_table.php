<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('provider', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('condominium_id')->unsigned();
			$table->foreign('condominium_id')->references('id')->on('condominium');
			$table->integer('provider_category_id')->unsigned();
			$table->foreign('provider_category_id')->references('id')->on('provider_category');
			$table->string('name');
			$table->text('description')->nullable();
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
		Schema::drop('provider');
	}

}
