@extends('layouts.app')

@section('content')
<div class="container">
    <div class='row'>
        <div class="col-md-6 offset-md-3 col-xs-12">
            <div class="text-center">
                <h1 class="mb-2">
                    {{ __('Sign in') }}
                </h1>
                <a href="{{ route('register') }}" class='auth-link'>Need an account?</a>
            </div>

            <div class="pt-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder='Email' value="{{ old('email') }}" autocomplete="email" required autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder='Password' required autocomplete="password" autofocus>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type='submit' class="btn btn-lg btn-primary float-right">{{__('Sign in')}}</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection