@extends('layouts.app')

@section('content')
<div>
    <section id='profile-banner' class="banner d-flex align-items-center justify-content-center">
        <div>profile pic</div>

    </section>
    <div class="container page">
        {{$user}}
    </div>
</div>
@endsection