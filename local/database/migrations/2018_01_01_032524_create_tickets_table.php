<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tickets', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('priority');
			$table->timestamps('create_at');
			$table->date('deadline');
			$table->integer('id_request');
			$table->integer('id_part');
			$table->integer('id_team');
			$table->integer('id_assign');
			$table->integer('id_related')->nullable();
			$table->string('content')->nullable();
			$table->string('url_img')->nullable();
			$table->timestamps('update_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tickets');
	}
}
