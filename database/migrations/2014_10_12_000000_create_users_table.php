<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_role_id')->unsigned();
            $table->foreign('user_role_id')->references('id')->on('user_roles');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum("sex",['m','f'])->default('m');
            $table->string('phone')->nullable();
            $table->text('description')->nullable();
            $table->string('cell_phone')->nullable();
            $table->date('birth')->nullable();
            $table->string('cpf')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('formation')->nullable();
            $table->string('institution')->nullable();
            $table->string('conclusion')->nullable();
            $table->string('profession')->nullable();
            $table->string('company')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('instagram')->nullable();
            $table->string('snapchat')->nullable();
            $table->string('site')->nullable();
            $table->string('imagem')->nullable();
            $table->enum("active",['y','fn'])->default('y');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
