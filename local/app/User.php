<?php

namespace App;

use App\Part;
use App\Team;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'avatar', 'birthday', 'gender', 'phonenumber', 'address', 'desc', 'id_team',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function team() {
		return $this->belongsTo('App\Team', 'id_team');
	}

	public function getTeam() {
		$team = Team::find($this->id_team);
		return $team;
	}

	public function getPart() {
		$team = Team::find($this->id_team);
		$part = Part::find($team['id_part']);
		return $part;
	}
}
