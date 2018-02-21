<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Auth;

class CommentController extends Controller {

	public function postComment($idTicket, CommentRequest $request) {
		$comment = new Comment();
		$comment->idTicket = $idTicket;
		$comment->idUser = Auth::user()->id;
		$comment->content = $request->contentComment;
		$comment->tag = 1;
		$comment->save();
		return redirect()->back();
	}
}
