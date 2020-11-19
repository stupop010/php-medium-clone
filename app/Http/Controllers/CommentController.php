<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = $request->comment;
        $articleId = (int)$request->articleId;
        $userId = auth()->user()->id;

        Comment::create(['comment' => $comment, 'article_id' => $articleId, 'user_id' => $userId]);

        return Comment::getCommentPagination($articleId);
    }

    public function index(Request $request)
    {
        return Comment::getCommentPagination($request->data);
    }

    public function destroy(Request $request)
    {
        return Comment::destroy($request->dataId);
    }
}
