<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$teams = [
			[
				'name' => 'Nhóm 1',
				'slug' => 'nhom-1',
				'id_part' => 1,
			],
			[
				'name' => 'Nhóm H2ATeam',
				'slug' => 'nhom-h2ateam',
				'id_part' => 1,
			],
			[
				'name' => 'Nhóm 2',
				'slug' => 'nhom-2',
				'id_part' => 2,
			],
			[
				'name' => 'Nhóm 3',
				'slug' => 'nhom-3',
				'id_part' => 1,
			],
			[
				'name' => 'Nhóm 4',
				'slug' => 'nhom-4',
				'id_part' => 2,
			],
		];
		DB::table('teams')->insert($teams);
	}
}
