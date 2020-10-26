@extends('layouts.app')

@section('content')
<div class="container page">
    <div class="row">
        <div class="col-md-6 offset-md-3 col-xs-12">
            <h1 class="text-center">Your Setting</h1>
            <form method="POST" action="/setting">
                @method('PATCH')
                @csrf
                <fieldset>

                    <div class="form-group">
                        <input id="username" type="text" class="form-control form-control-lg" name="username" placeholder='Username' value="{{ $user->username }}" autofocus>
                    </div>

                    <div class="form-group">
                        <textarea id="bio" rows="8" type="text" class="form-control form-control-lg @error('bio') is-invalid @enderror" name="bio" placeholder='Short bio about you' autofocus>{{$user->bio ?? ''}}</textarea>

                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-lg" name="email" placeholder='Email' value="{{ $user->email }}" autofocus>
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}" placeholder='Password' autofocus>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type='submit' class="btn btn-lg btn-success float-right">{{__('Update Settings')}}</button>

                </fieldset>
            </form>

            <hr />

            <button type='button' class="btn btn-outline-danger"> <a href="{{ route('logout') }}">Or click here to logout.</a></button>
        </div>
    </div>
</div>
@endsection