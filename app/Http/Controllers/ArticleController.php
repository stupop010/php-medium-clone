<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;


use Cocur\Slugify\Slugify;

class ArticleController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function store(Request $request)
    {

        $slugify = new Slugify();
        $userId = Auth::id();
        $random32bitString = base_convert(rand() * pow(36, 6) | 0, 10, 32);
        $slug = $slugify->slugify($request->input('title')) . '-' . $random32bitString;


        $user = User::find($userId);
        $article = $user->articles()->create([
            'slug' => $slug,
            'title' => $request->input('title'),
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
        ]);



        $tags = $request->input('articleTags');

        foreach ($tags as $tag) {
            Tag::create([
                'tag' => $tag,
                'article_id' => $article->id
            ]);
        };

        return $article;
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->with(['user', 'tag'])->firstOrFail();

        return view('article', ['article' => $article]);
    }

    public function index()
    {
        return view('editor');
    }
}
