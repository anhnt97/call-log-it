<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('teams', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('phonenumber')->nullable();
			$table->string('address')->nullable();
			$table->text('desc')->nullable();
			$table->string('slug');
			$table->integer('id_part')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('teams');
	}
}
