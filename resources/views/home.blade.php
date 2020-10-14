@extends('layouts.app')

@section('content')
<div>
    <section id="home-banner" class="banner d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1>Chime</h1>
            <p>A place to share your knowledge.</p>
        </div>
    </section>
    <div class="container page">
        <div class="d-flex">
            <div class='w-75'>

                @if (count($articles) === 0)
                <div>No articles are here... yet.</div>
                @endif

                @foreach ($articles as $article)
                <div class="article-preview py-4">

                    <div class="d-flex justify-content-between article-meta">
                        <div class="d-flex">
                            <img src="{{ url('/images/default-avatar.png') }}" alt='Default avatar' width='35px' />
                            <div class="ml-2">
                                <a href="#">{{ $article->user->username}}</a>
                                <span class='d-block'>{{date("F j, Y", strtotime($article->created_at))}}</span>
                            </div>
                        </div>
                        <div>follows</div>
                    </div>

                    <a href='/article/{{ $article->slug }}'>
                        <div class="my-3">
                            <h2 class="m-0">{{ $article->title }}</h2>
                            <p>{{ $article->subject }}</p>
                        </div>
                    </a>

                    <div class="d-flex justify-content-between article-footer">

                        <a href='/article/{{ $article->slug }}'>read more...</a>
                        <div>
                            @foreach ($article->tag as $tag)
                            <span>{{$tag->tag}}</span>
                            @endforeach
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
            <div>
                <div class="p-2 popular-tags">
                    <h3>Popular Tags</h3>
                    @foreach ($tags as $tag)
                    <span>{{$tag->tag}}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection