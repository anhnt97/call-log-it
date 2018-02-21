<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model {
	protected $table = 'parts';

	protected $fillable = ['name', 'desc', 'slug'];

	public function team() {
		return $this->hasMany('App\Team', 'id_part');
	}
}
