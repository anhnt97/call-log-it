<?php

use Illuminate\Database\Seeder;

class PartsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$parts = [
			[
				'name' => 'Bộ phận IT Hà Nội',
				'desc' => 'Hà Nội',
				'slug' => 'bo-phan-it-ha-noi',
			],
			[
				'name' => 'Bộ phận IT Đà Nẵng',
				'desc' => 'Đà Nẵng',
				'slug' => 'bo-phan-it-da-nang',
			],
		];
		DB::table('parts')->insert($parts);
	}
}
