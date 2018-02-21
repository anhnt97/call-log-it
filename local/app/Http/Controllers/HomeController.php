<?php

namespace App\Http\Controllers;
use App\Team;
use DB;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('home');
	}
	// Trang chủ
	public function homepage() {
		return view('pages.home.homepage');
	}
	// Lấy danh sách nhóm
	public function getDataTeam($id) {
		$listTeam = DB::table('teams')
			->where('id_part', $id)
			->pluck('name', 'id');
		return response()->json($listTeam);
	}
	// Lấy danh sách nhân viên
	public function getDataUser($idTeam) {
		$team = Team::where('id', $idTeam)->first();
		$listUser = DB::table('users')
			->where('id_team', $team['id'])
			->pluck('name', 'id');
		return response()->json($listUser);
	}
}
