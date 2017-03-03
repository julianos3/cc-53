<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiariesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('diaries', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('condominium_id')->unsigned();
            $table->foreign('condominium_id')->references('id')->on('condominium');
            $table->integer('user_condominium_id')->unsigned();
            $table->foreign('user_condominium_id')->references('id')->on('user_condominium');
            $table->integer('reserve_area_id')->unsigned();
            $table->foreign('reserve_area_id')->references('id')->on('reserve_areas');
						$table->string('reason')->nullable();
						$table->date('date');
						$table->time('start_time');
						$table->time('end_time');
						$table->text('description')->nullable();
						$table->decimal('value')->nullable();
						$table->enum('notify', ['y', 'n'])->default('n');
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
		Schema::drop('diaries');
	}

}
