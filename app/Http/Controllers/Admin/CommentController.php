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
        $search = $request->search;

        $user = $this->user->find($userId);

        if (!$user) {
            return redirect()->back();
        }
        
        $comments = $this->comment->getComments(
            search: $search ?? ''
        );

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create (Request $request) {
        
        $userId = $request->id;

        $user = $this->user->find($userId);

        if (!$user) {
            return redirect()->back();
        }

        return view('users.comments.create', compact('user'));
    }

    public function store (Request $request) {

        $userId = $request->id;

        $user = $this->user->find($userId);

        if (!$user) {
            return redirect()->back();
        }

        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', ['id' => $userId]);
    }

    public function edit (Request $request) {

        $userId = $request->user_id;
        $commentId = $request->comment_id;

        $comment = $this->comment->find($commentId);

        if (!$comment) {
            return redirect()->back();
        }

        $user = $comment->user;

        if ($user->id != $userId) {
            return redirect()->route('comments.index', ['id' => $user->id]);
        }

        return view('users.comments.edit', compact('user', 'comment'));
    }

    public function update (Request $request) {

        $userId = $request->user_id;
        $commentId = $request->comment_id;
        
        $comment = $this->comment->find($commentId);

        
        if (!$comment) {
            return redirect()->back();
        }

        $user = $comment->user;

        if ($user->id != $userId) {
            return redirect()->route('comments.index', ['id' => $user->id]);
        }

        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $userId);
    }
}
