<?php

namespace App\Http\Controllers;

use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = $request->comment;
        $articleId = (int)$request->articleId;
        $userId = auth()->user()->id;

        Comment::create(['comment' => $comment, 'article_id' => $articleId, 'user_id' => $userId]);

        $comments = Comment::paginate(10);

        log::info($comments);
        return $comments;
    }

    public function index(Request $request)
    {

        $comments = Comment::where('article_id', $request->data)->with('user')->paginate(10);

        return $comments;
    }
}
