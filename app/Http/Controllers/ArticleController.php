<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



use Cocur\Slugify\Slugify;

class ArticleController extends Controller
{
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

        return redirect('/');
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->with(['user', 'tag'])->firstOrFail();
        $comments = Comment::paginate(2);

        return view('article', compact('article', 'comments'));
    }

    public function index()
    {
        return view('editor');
    }
}
