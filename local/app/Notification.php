<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model {
	protected $table = 'notifications';
	public $timestamps = false;
	public function getTimeNotification() {
		$dateDiff = new Carbon($this->create_at);
		return $dateDiff->diffForHumans();
	}
}
