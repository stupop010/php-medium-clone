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

        log::info($articleId);

        $comment = Comment::create(['comment' => $comment, 'article_id' => $articleId, 'user_id' => $userId]);

        log::info($comment);
    }
}
