<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageGroupTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('message_group', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('message_id')->unsigned();
			$table->foreign('message_id')->references('id')->on('message');
			$table->integer('group_condominium_id')->unsigned();
			$table->foreign('group_condominium_id')->references('id')->on('group_condominium');
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
		Schema::drop('message_group');
	}

}
