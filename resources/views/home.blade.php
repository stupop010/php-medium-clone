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

                @foreach ($articles ?? '' as $article)
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

                    <div class="my-3">
                        <h2 class="m-0">{{ $article->title }}</h2>
                        <p>{{ $article->subject }}</p>
                    </div>

                    <div class="d-flex justify-content-between article-footer">
                        <p>read more...</p>
                        <div>tags</div>
                    </div>

                </div>
                @endforeach

            </div>
            <div>popular</div>
        </div>
    </div>
</div>
@endsection