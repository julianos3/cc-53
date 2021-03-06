<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCommunicationTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_communication', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_condominium_id')->unsigned();
            $table->foreign('user_condominium_id')->references('id')->on('user_condominium');
            $table->integer('communication_id')->unsigned();
            $table->foreign('communication_id')->references('id')->on('communication');
            $table->enum('view', ['y', 'n'])->default('n');
            $table->dateTime('date_view')->nullable();
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
		Schema::drop('user_communication');
	}

}
