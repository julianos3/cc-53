<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleCondominiumTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_role_condominium', function(Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->enum('active', ['y', 'n'])->default('n');
			$table->enum('admin', ['y', 'n'])->default('n');
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
		Schema::drop('user_role_condominium');
	}

}
