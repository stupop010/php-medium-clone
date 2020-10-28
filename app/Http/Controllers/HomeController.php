<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $tagQuery = $request->query('tag');

        // Fetch top 10 popular tags
        $tags = Tag::all()->take(10)->unique('tag');

        $articles = [];

        // Fetch articles if queried by tag
        if ($tagQuery) {
            $tagQuery = $request->query('tag');

            $articleTags = Tag::all()->where('tag', $tagQuery)->toArray();

            if (count($articleTags) == 0) {
                abort(404);
            };

            foreach ($articleTags as $tag) {
                $article = Article::where('id', $tag['article_id'])->with(['user', 'tag'])->withCount('follow')->get();
                array_push($articles, $article[0]);
            }
        } else {
            $articles = Article::with(['user', 'tag'])->withCount('follow')->get();
        }


        return view('home', compact('articles', 'tags'));
    }
}
