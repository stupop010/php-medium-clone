<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return 'hello';
    }

    public function store(Request $request)
    {
        $articleId = $request->articleId;
        // $userId = auth()->user()->id;

        Log::info(json_encode(auth()));

        return 'hellos';
    }
}
