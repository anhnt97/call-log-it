<?php

namespace App\Http\Controllers;

use App\Part;
use App\Team;
use App\User;
use DB;
use Illuminate\Http\Request;
use Session;

class ManagerController extends Controller {
	// Danh sách bộ phận
	public function listPartIT() {
		$listParts = Part::all();
		return view('pages.manager.listPartIT', compact('listParts'));
	}
	// Danh sách nhóm trong bộ phận
	public function listTeamInPart($slugPart) {
		$part = Part::where('slug', $slugPart)->first();
		if (!$part) {
			return 'Không tìm thấy bộ phận';
		}
		$listTeams = Team::where('id_part', $part->id)->get();
		return view('pages.manager.listTeamInPart', compact('listTeams', 'part'));
	}
	// Danh sách nhân viên trong nhóm
	public function listUserInTeam($slugPart, $slugTeam) {
		$part = Part::where('slug', $slugPart)->first();
		if (!$part) {
			return 'Không tìm thấy bộ phận';
		}
		$team = Team::where('slug', $slugTeam)->first();
		if (!$team) {
			return 'Không tìm thấy nhóm';
		}
		$listUsers = User::where('id_team', $team->id)->get();
		return view('pages.manager.listUserInTeam', compact('listUsers', 'team', 'part'));
	}
	// Thêm nhân viên
	public function createUser() {
		$listPart = DB::table('parts')->pluck('name', 'id');
		return view('pages.manager.createUser', compact('listPart'));
	}
	// Lưu thông tin nhân viên
	public function saveCreateUser(Request $request) {
		$user = new User();
		$user->fill($request->all());
		if ($request->hasFile('avatar')) {
			$file = $request->file('avatar');
			$fileName = uniqid() . "-" . $file->getClientOriginalName();
			$file->storeAs('uploads/avatar', $fileName);
			$user->avatar = 'uploads/avatar/' . $fileName;
		}
		$user->save();
		Session::flash('msg', 'Thêm mới nhân viên thành công');
		return redirect()->back();
	}
	// Xóa nhân viên
	public function removeUser($idUser) {
		$user = User::where(['id' => $idUser])->first();
		if (!$user) {
			return 'Không tìm thấy nhân viên';
		}
		$user->delete();
		Session::flash('msg', 'Xóa nhân viên thành công');
		return redirect()->back();
	}
}
