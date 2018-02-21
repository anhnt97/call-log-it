<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Http\Requests\CreateRequest;
use App\Http\Requests\EditTicketRequest;
use App\Notification;
use App\Part;
use App\Status;
use App\Team;
use App\Ticket;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Mail;
use Session;

class TicketController extends Controller {
	// Hiển thị chi tiết công việc
	public function viewTicket($id) {
		$status = Status::all();
		$listPart = DB::table('parts')->pluck('name', 'id');
		$users = User::all();
		$ticket = Ticket::find($id);
		if (!$ticket) {
			return redirect()->route('homepage');
		}
		$comments = Comment::where([['idTicket', $ticket->id], ['tag', 1]])->orderBy('id', 'desc')->get();
		$history = Comment::where([['idTicket', $ticket->id], ['tag', 2]])->orderBy('id', 'desc')->get();
		return view('pages.ticket.viewTicket', compact('ticket', 'comments', 'history', 'users', 'listPart', 'status'));
	}
	// Đóng công việc
	public function updateTicket($id) {
		$ticket = Ticket::find($id);
		if (!$ticket) {
			return redirect()->route('homepage');
		}
		if ($ticket->status < 5) {
			$ticket->status = $ticket->status + 1;
		}
		$ticket->save();
		Session::flash('msg', 'Bạn đã cập nhật công việc thành công');
		return redirect()->back();
	}
	public function closeTicket($id, $rate, Request $request) {
		// dd($id, $rate, $request);
		$ticket = Ticket::find($id);
		if (!$ticket) {
			return redirect()->route('homepage');
		}
		$ticket->status = 5;
		$ticket->rate = $rate;
		if ($request->reasonrate) {
			$ticket->reasonrate = $request->reasonrate;
		}
		$ticket->save();
		Session::flash('msg', 'Bạn đã đóng công việc');
		return redirect()->back();
	}

	// Thêm công việc
	public function createTicket() {
		$listPart = DB::table('parts')->pluck('name', 'id');
		$users = User::all();
		return view('pages.ticket.createRequest', compact('listPart', 'users'));
	}
	// Lưu thông tin công việc
	public function saveCreateTicket(CreateRequest $request) {
		$ticket = new Ticket();
		$ticket->fill($request->all());
		$create_at = Carbon::now();
		$ticket->create_at = $create_at;
		$deadline = Carbon::createFromFormat('d/m/Y - H:i', $request->deadline);
		$ticket->update_at = Carbon::now();
		$ticket->deadline = $deadline;
		$ticket->id_request = Auth::id();

		$team = Team::find($request->id_team);
		if ($request->id_assign == null) {
			$assign = User::where([['id_team', $request->id_team], ['role', 300]])->first();
			$ticket->id_assign = $assign['id'];
		}

		if ($request->hasFile('url_img')) {
			$file = $request->file('url_img');
			$fileName = uniqid() . "-" . $file->getClientOriginalName();
			$file->storeAs('uploads/tickets', $fileName);
			$ticket->url_img = 'uploads/tickets/' . $fileName;
		} else {
			$ticket->url_img = 'uploads/tickets/ticket.png';
		}
		$ticket->save();

		$userAssign = User::find($ticket->id_assign);
		$userRelated = User::find($ticket->id_related);
		// Gửi mail
		Mail::send('mail_template.ticket', compact('ticket'), function ($message) use ($ticket, $userAssign, $userRelated) {
			$message->to($userAssign->email, $userAssign->name);

			if ($userRelated->id != null) {
				$message->cc($userRelated->email, $userRelated->name);
			}

			$message->subject('[Công việc]' . $ticket->name);
		});
		//////////
		$noti = new Notification();
		$noti->idUser = $ticket->id_assign;
		$contentNoti = $ticket->ticketGetMemberName($ticket->id_request) . ' tạo công việc ' . $ticket->name;
		$noti->content = $contentNoti;
		$noti->create_at = Carbon::now();
		$noti->idTicket = $ticket->id;
		$noti->status = 0;
		$noti->save();
		// dd($ticket->id_related);
		// if ($ticket->id_related != null) {
		// 	$noti->idUser = $ticket->id_related;
		// 	$contentNoti = $ticket->ticketGetMemberName($ticket->id_request) . ' tạo công việc' . $ticket->name;
		// 	$noti->content = $contentNoti;
		// 	$noti->create_at = Carbon::now(+1);
		// 	$noti->idTicket = $ticket->id;
		// 	$noti->status = 0;
		// 	$noti->save();
		// }
		Session::flash('msg', 'Yêu cầu đã được gửi đi');
		return redirect()->route('my-request');
	}
	// Xóa công việc
	public function removeTicket($id) {
		$ticket = Ticket::find($id);
		if (!$ticket) {
			return redirect()->route('homepage');
		}
		$ticket->delete();
		Session::flash('msg', 'Xóa công việc thành công');
		$noti = new Notification();
		$noti->idUser = $ticket->id_request;
		$contentNoti = $ticket->ticketGetMemberName(Auth::id()) . ' xóa công việc ' . $ticket->name;
		$noti->content = $contentNoti;
		$noti->create_at = Carbon::now();
		$noti->idTicket = $ticket->id;
		$noti->status = 0;
		$noti->save();
		return redirect()->route('homepage');
	}
	// Sửa công việc
	public function editTicket($id) {
		$status = Status::all();
		$listPart = DB::table('parts')->pluck('name', 'id');
		$users = User::all();
		$ticket = Ticket::where('id', $id)->first();
		return view('pages.tickets.updateTicket', compact('listPart', 'users', 'ticket', 'status'));
	}
	// Cập nhật công việc
	public function saveEditTicket(EditTicketRequest $request) {
		$ticket = Ticket::where('id', $request->id)->first();
		if (!$ticket) {
			return redirect()->route('homepage');
		}
		// $ticket->fill($request->all());

		$comment = new Comment();
		$comment->idUser = Auth::user()->id;
		$comment->idTicket = $request->id;
		$comment->tag = 2;
		if ($request->status) {
			$change = 'Thay đổi trạng thái: ' . $ticket->ticketGetStatusName($ticket->status) . '=>' . $ticket->ticketGetStatusName($request->status);
			$ticket->status = $request->status;
		}
		if ($request->deadline) {
			$deadline = Carbon::createFromFormat('d/m/Y - H:i', $request->deadline);
			$change = 'Thay đổi ngày hết hạn:' . $ticket->deadline . '=>' . $deadline;
			$ticket->deadline = $deadline;
		}
		if ($request->priority) {
			$change = 'Thay đổi mức độ ưu tiên: ' . $ticket->priority . '=>' . $request->priority;
			$ticket->priority = $request->priority;
		}
		if ($request->id_assign) {
			$assign = User::find($request->id_assign);
			$change = 'Thay đổi mức độ người thực hiện: ' . $ticket->ticketGetMemberName($ticket->id_assign) . '=>' . $assign->name;
			$ticket->id_assign = $request->id_assign;
		}
		if ($request->id_related) {
			$related = User::find($request->id_related);
			$change = 'Thay đổi mức độ người liên quan: ' . $ticket->ticketGetMemberName($ticket->id_related) . '=>' . $related->name;
			$ticket->id_related = $request->id_related;
		}
		// dd($request->contentComment);
		$comment->change = $change;
		$content = 'Lý do thay đổi: ' . $request->contentComment;
		$comment->content = $content;
		$comment->save();

		if ($request->hasFile('url_img')) {
			$file = $request->file('url_img');
			$fileName = uniqid() . "-" . $file->getClientOriginalName();
			$file->storeAs('uploads/tickets', $fileName);
			$ticket->url_img = 'uploads/tickets/' . $fileName;
		}

		$ticket->save();
		$noti = new Notification();
		$noti->idUser = $ticket->id_request;
		$contentNoti = $ticket->ticketGetMemberName(Auth::user()->id) . ' thay đổi công việc ' . $ticket->name;
		$noti->content = $contentNoti;
		$noti->create_at = Carbon::now();
		$noti->idTicket = $ticket->id;
		$noti->status = 0;
		$noti->save();

		Session::flash('msg', 'Thực hiện thay đổi thành công');
		return redirect()->route('view-ticket', ['id' => $request->id]);
	}

	//////////////////////////////////////////////////
	// Danh sách công việc liên quan
	// Tất cả
	public function relatedRequest() {
		$listTickets = Ticket::where('id_related', Auth::id())->get();
		return view('pages.ticket.relatedRequest', compact('listTickets'));
	}
	// Trạng thái công việc liên quan
	public function relatedRequestStatus($slugStatus) {
		$status = Status::where('slug', $slugStatus)->first();
		$listTickets = Ticket::where([['id_related', Auth::id()], ['status', $status->id]])->get();
		return view('pages.ticket.relatedRequest', compact('listTickets', 'status'));
	}
	// Danh sách công việc được giao
	// Tất cả
	public function assignedRequest() {
		$listTickets = Ticket::where('id_assign', Auth::id())->get();
		return view('pages.ticket.assignRequest', compact('listTickets'));
	}
	// Trạng thái công việc được giao
	public function assignedRequestStatus($slugStatus) {
		$status = Status::where('slug', $slugStatus)->first();
		$listTickets = Ticket::where([['id_assign', Auth::id()], ['status', $status->id]])->get();
		return view('pages.ticket.assignRequest', compact('listTickets', 'status'));
	}
	// Danh sách công việc tôi yêu cầu
	// Tất cả
	public function myRequest() {
		$listTickets = Ticket::where('id_request', Auth::id())->get();
		return view('pages.ticket.myRequest', compact('listTickets'));
	}
	// Trạng thái công việc tôi yêu cầu
	public function myRequestStatus($slugStatus) {
		$status = Status::where('slug', $slugStatus)->first();
		$listTickets = Ticket::where([['id_request', Auth::id()], ['status', $status->id]])->get();
		return view('pages.ticket.myRequest', compact('listTickets', 'status'));
	}
	// Danh sách công việc trong team
	// Tất cả
	public function listTeamTicket($slugTeam) {
		$team = Team::where('slug', $slugTeam)->first();
		if (!$team) {
			return redirect()->route('homepage');
		}
		$listTickets = Ticket::where('id_team', $team->id)->get();
		return view('pages.ticket.listTeamTicket', compact('team', 'listTickets'));
	}
	// Trạng thái công việc trong team
	public function listTeamTicketStatus($slugTeam, $slugStatus) {
		$status = Status::where('slug', $slugStatus)->first();
		$team = Team::where('slug', $slugTeam)->first();
		if (!$team) {
			return redirect()->route('homepage');
		}
		$listTickets = Ticket::where([['id_team', $team->id], ['status', $status->id]])->get();
		return view('pages.ticket.listTeamTicket', compact('team', 'listTickets', 'status'));
	}
	// Danh sách công việc trong bộ phận
	// Tất cả
	public function listPartTicket($slugPart) {
		$part = Part::where('slug', $slugPart)->first();
		if (!$part) {
			return redirect()->route('homepage');
		}
		$listTickets = Ticket::where('id_part', $part->id)->get();
		return view('pages.ticket.listPartTicket', compact('part', 'listTickets'));
	}
	// Trạng thái công việc trong bộ phận
	public function listPartTicketStatus($slugPart, $slugStatus) {
		$status = Status::where('slug', $slugStatus)->first();
		$part = Part::where('slug', $slugPart)->first();
		if (!$part) {
			return redirect()->route('homepage');
		}
		$listTickets = Ticket::where([['id_part', $part->id], ['status', $status['id']]])->get();
		return view('pages.ticket.listPartTicket', compact('part', 'listTickets', 'status'));
	}
}
