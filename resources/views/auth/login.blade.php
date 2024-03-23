@extends('layouts.auth')
@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-light text-uppercase">{{ __('main.sginin')}}</h2>
                                <p class="text-white-50 mb-5">{{__('main.welcome_title')}}</p>

                                <div class="form-floating mb-3">
                                    <input id="floatingNationalID" type="string"
                                        class="form-control rounded-pill @error('national_id') is-invalid @enderror"
                                        name="national_id" value="{{ old('national_id') }}" required
                                        autocomplete="national_id" placeholder="{{ __('main.national_id')}}">
                                    <label for="floatingNationalID">{{ __('main.national_id')}}</label>
                                    @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input id="floatingPassword" type="string"
                                        class="form-control rounded-pill @error('password') is-invalid @enderror" name="password"
                                        value="{{ old('password') }}" required autocomplete="password"
                                        placeholder="{{ __('main.password')}}">
                                    <label for="floatingPassword">{{ __('main.password')}}</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">{{__('main.sginin')}}</button>
                                
                                <div class="my-5 text-light" style="width: 100%; height: 20px; border-bottom: 1px solid white; text-align: center">
                                    <span style=" background-color: #212529; padding: 0 25px;" class="fw-bolder fs-4">
                                    {{__('main.or')}}
                                    </span>
                                  </div>
                                <div class=" d-flex justify-content-center my-2 row">
                                    <div class="col-12 my-4">
                                        <a href="{{ route('auth.social',['social'=>App\Enums\SocialNetworksEnum::FACEBOOK]) }}"
                                            class=" my-2 login-with-facebook-btn text-decoration-none rounded-pill">
                                            <i class="fab fa-facebook-f fa-lg mx-1"></i> {{__('main.login_with_facebook')}}   
                                        </a>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <a class=" my-2 login-with-google-btn rounded-pill text-secondary text-decoration-none"
                                            target="__blank"
                                            href="{{ route('auth.social',['social'=>App\Enums\SocialNetworksEnum::GOOGLE]) }}">
                                           {{__('main.login_with_google')}}
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </form>

                        <div>
                            <p class="mb-0 text-light">{{ __('main.dont_have_an_account')}} <a
                                    href="{{route('register')}}" class="text-white-50 fw-bold">{{
                                    __('main.sginup')}}</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded-3 shadow-lg p-3">
                <div class="card-body ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h4 class=" ">{{ __('main.sginin')}}</h4>
                </div>
                <div class="row mb-3">

                    <label for="national_id" class="col-form-label ">{{ __('main.national_id')}}</label>

                    <div class="">
                        <input id="national_id" type="sttring"
                            class="form-control @error('national_id') is-invalid @enderror" name="national_id"
                            value="{{ old('national_id') }}" required autocomplete="national_id" autofocus>

                        @error('national_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class=" col-form-label ">{{ __('main.password')}}</label>

                    <div class="">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
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
                    <span style="padding: 0 10px;">{{ __('main.or')}}</span>
                    <hr style="flex-grow: 1; border: 1px solid black;">
                </div>
                <div class="row mb-3 col-12 p-3 d-block text-center">
                    <a href="{{ route('auth.social',['social'=>App\Enums\SocialNetworksEnum::FACEBOOK]) }}"> <img
                            src="{{asset('images/facebook-icon.png')}}" alt="" style="width: 40px;" srcset=""> </a>

                    <a href="{{ route('auth.social',['social'=>App\Enums\SocialNetworksEnum::GOOGLE]) }}"> <img
                            src="{{asset('images/google-icon.webp')}}" alt="" style="width: 40px;" srcset=""> </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div> --}}