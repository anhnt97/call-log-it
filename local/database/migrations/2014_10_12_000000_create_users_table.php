<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password')->default(Hash::make(12345678));
			$table->string('avatar')->nullable();
			$table->string('birthday')->nullable();
			$table->string('gender')->nullable();
			$table->string('phonenumber')->nullable();
			$table->string('address')->nullable();
			$table->text('desc')->nullable();
			$table->integer('id_team')->nullable();
			$table->integer('role')->default(100);
			$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('users');
	}
}
