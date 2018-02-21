<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {
	protected $table = 'teams';

	protected $fillable = ['name', 'phonenumber', 'address', 'desc', 'slug', 'id_part'];

	public function part() {
		return $this->belongsTo('App\Part', 'id_part');
	}

	public function user() {
		return $this->hasMany('App\User', 'id_team');
	}
}
