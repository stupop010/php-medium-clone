@extends('layouts.app')

@section('content')
<div>
    <section id='profile-banner' class="banner d-flex align-items-center justify-content-center">
        <div class='text-center my-4'>
            <img src="{{ url('/images/default-avatar.png') }}" width="100px" class="mb-1" />
            <h1 class="m-0">{{$user->username}}</h1>
        </div>
    </section>
    <div class=" container page">
        @if (count($articles) === 0)
        <div>No articles are here... yet.</div>
        @endif

        @foreach ($articles as $article)
        <div class="article-preview py-4">

            <div class="d-flex justify-content-between article-meta">
                <div class="d-flex">
                    <img src="{{ url('/images/default-avatar.png') }}" alt='Default avatar' width='35px' />
                    <div class="ml-2">
                        <a href="/profile/{{ $article->user->username}}">{{ $article->user->username}}</a>
                        <span class='d-block'>{{date("F j, Y", strtotime($article->created_at))}}</span>
                    </div>
                </div>
                <div>
                    <follow article-id="{{$article->id}}" follow-count="{{$article->follow_count}}" />
                </div>
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
                    <a href='/?tag={{ $tag->tag}}'>
                        <span>{{$tag->tag}}</span>
                    </a>
                    @endforeach
                </div>
            </div>

        </div>
        @endforeach
    </div>
</div>
@endsection