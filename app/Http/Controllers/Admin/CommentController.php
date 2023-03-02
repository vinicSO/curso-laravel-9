<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user) {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index (Request $request) {

        $userId = $request->id;

        $user = $this->user->find($userId);

        if (!$user) {
            return redirect()->back();
        }
        
        $comments = $user->comments()->get();

        return view('users.comments.index', compact('user', 'comments'));
    }
}
