<?php

namespace App\Http\Controllers;
use App\Notification;

class NotificationController extends Controller {
	public function getNoti($idNoti, $status) {
		$noti = Notification::find($idNoti);
		$noti->status = $status;
		$noti->save();
		return redirect()->route('view-ticket', ['id' => $noti->idTicket]);
	}
}
