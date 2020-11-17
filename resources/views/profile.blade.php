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

        <profile articles="{{  $articles }}"></profile>
    </div>
</div>
@endsection