<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
	protected $table = 'tickets';

	protected $fillable = ['name', 'priority', 'create_at', 'deadline', 'id_request', 'id_part', 'id_team', 'id_assign', 'id_related', 'content', 'url_file', 'url_img', 'status'];

	public $timestamps = false;

	public function ticketGetMemberName($id) {
		$user = User::find($id);
		if ($user) {
			return $user['name'];
		}

		return 'Không có giá trị';
	}

	public function ticketGetTeamName() {
		$team = Team::find($this->id_team);
		return $team['name'];
	}

	public function ticketGetPartName() {
		$part = Part::find($this->id_part);
		return $part['name'];
	}

	public function ticketGetStatusName($id) {
		$status = Status::find($id);
		return $status['name'];
	}
}
