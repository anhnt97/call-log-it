<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$status = [
			[
				'name' => 'Mới nhất',
				'slug' => 'moi-nhat',
			],
			[
				'name' => 'Đang xử lý',
				'slug' => 'dang-xu-ly',
			],
			[
				'name' => 'Hoàn thành',
				'slug' => 'hoan-thanh',
			],
			[
				'name' => 'Phản hồi',
				'slug' => 'phan-hoi',
			],
			[
				'name' => 'Đã đóng',
				'slug' => 'da-dong',
			],
			[
				'name' => 'Hủy bỏ',
				'slug' => 'huy-bo',
			],
			[
				'name' => 'Quá hạn',
				'slug' => 'qua-han',
			],
		];
		DB::table('status')->insert($status);
	}
}
