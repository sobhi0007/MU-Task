@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="national_id" class="col-md-4 col-form-label text-md-end">{{ __('national_id')
                                }}</label>

                            <div class="col-md-6">
                                <input id="national_id" type="number" class="form-control @error('national_id') is-invalid @enderror"
                                    name="national_id" value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                                @error('national_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                        old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div style="display: flex; align-items: center;" class="my-3">
                        <hr style="flex-grow: 1; border: 1px solid black;">
                        <span style="padding: 0 10px;">OR Login via </span>
                        <hr style="flex-grow: 1; border: 1px solid black;">
                    </div>
                    <div class="row mb-3 col-12 p-3 d-block text-center">
                        <a href="{{ route('auth.social',['social'=>App\Enums\SocialNetworksEnum::FACEBOOK]) }}"> <img src="{{asset('images/facebook-icon.png')}}"
                                alt="" style="width: 40px;" srcset=""> </a>

                        <a href="{{ route('auth.social',['social'=>App\Enums\SocialNetworksEnum::GOOGLE]) }}"> <img src="{{asset('images/google-icon.webp')}}" alt=""
                                style="width: 40px;" srcset=""> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection