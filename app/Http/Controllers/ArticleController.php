<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use App\Models\Tag;
use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Cocur\Slugify\Slugify;

class ArticleController extends Controller
{
    public function index()
    {
        return view('editor');
    }

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

        return view('article', compact('article'));
    }

    public function destroy(Request $request)
    {
        $userId = auth()->user()->id;
        $articleId = $request->articleId;

        Follow::where('article_id', $articleId)->delete();
        Comment::where('article_id', $articleId)->delete();
        Tag::where('article_id', $articleId)->delete();
        Article::destroy($request->articleId);

        $articles = Article::where('user_id', $userId)->with(['user', 'tag'])->orderBy('created_at', 'DESC')->withCount('follow')->get();

        return $articles;
    }
}
