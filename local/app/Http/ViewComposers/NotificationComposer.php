<?php
namespace App\Http\ViewComposers;
use App\Notification;
use Auth;
use Illuminate\View\View;

/**
 *
 */

class NotificationComposer {
	public function compose(View $view) {
		$noti = Notification::where([['idUser', Auth::user()->id], ['status', 0]])->get();
		$count = count($noti);
		$notification = Notification::where('idUser', Auth::user()->id)->orderBy('create_at', 'desc')->get();
		$view->with('notifications', $notification);
		$view->with('count', $count);
	}
}

?>