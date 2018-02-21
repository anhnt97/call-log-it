<?php

namespace App;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	protected $table = 'comments';
	public $timestamps = false;
	public function getUserComment() {
		$user = User::find($this->idUser);
		return $user;
	}

	public function getDateCarbon() {
		$dateDiff = new Carbon($this->create_at);
		return $dateDiff->diffForHumans();
	}
}
