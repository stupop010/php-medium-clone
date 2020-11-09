<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;

class FollowController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $articleId = $request->articleId;
        $userId = auth()->user()->id;

        $follow = Follow::where(['article_id' => $articleId, 'user_id' => $userId])->get();

        if (count($follow) > 0) {
            return response()->json(['error' => 'Already Liked'], 403);
        }

        $createFollow = Follow::create(['article_id' => $articleId, 'user_id' => $userId]);
        return $createFollow;
    }
}
