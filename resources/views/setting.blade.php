@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 col-xs-12">
            <form action="POST">
                <div class="form-group">
                    <input id="title" type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" name="title" placeholder='Title' value="{{ old('title') }}" autocomplete="text" required autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</div>
@endsection