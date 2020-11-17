@extends('layouts.app')

@section('content')
<section class='article-header py-4'>
    <div class="container py-2">
        <h1>{{$article->title}}</h1>
        <div class="d-flex align-items-center mt-4">
            <img src="/images/light-avatar.png" alt="light default avatar" width="40px" />
            <div class="ml-2">
                <h2>{{$article->user->username}}</h2>
                <p>{{date("F j, Y", strtotime($article->created_at))}}</p>
            </div>
        </div>
    </div>
</section>

<div class="container page">
    <article-display :article="{{ json_encode($article->body) }}"></article-display>

    @auth
    <hr>

    <div class="comment-container mt-5">
        <comment article-id="{{$article->id}}"></comment>
    </div>
    @endauth

</div>

@endsection