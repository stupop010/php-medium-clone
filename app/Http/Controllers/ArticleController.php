<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Cocur\Slugify\Slugify;

class ArticleController extends Controller
{
    public function store(Request $request)
    {

        $slugify = new Slugify();
        Log::info(json_encode($slugify->slugify($request->input('title'))));

        return Article::create([
            'slug' => $slugify->slugify($request->input('title')),
            'title' => $request->input('title'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body')
        ]);

        return 's';
    }

    public function index()
    {
        return view('editor');
    }
}
