@extends('layouts.auth')
@section('content')
<style>
    .row {
    --bs-gutter-x: 0rem;
    }
    .form-control {
        width: 95%;
    }
</style>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-6">
                <div class="card bg-dark" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-md-5 mt-md-4  row ">

                                <h2 class="fw-bold mb-2 text-light text-uppercase">{{ __('main.sginup')}}</h2>
                                <p class="text-white-50 mb-5">{{__('main.welcome_title')}}</p>

                                <div class="form-floating  col-12 col-md-12 mb-3">
                                    <input id="floatingNationalID" type="string"
                                        class="form-control form-control-sm rounded-pill @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required
                                        autocomplete="name" placeholder="{{ __('main.name')}}">
                                    <label for="floatingNationalID">{{ __('main.name')}}</label>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating  col-12 col-md-6 mb-3">
                                    <input id="floatingNationalID" type="string"
                                        class="form-control form-control-sm rounded-pill @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required
                                        autocomplete="email" placeholder="{{ __('main.email')}}">
                                    <label for="floatingNationalID">{{ __('main.email')}}</label>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating  col-12 col-md-6 mb-3">
                                    <input id="floatingNationalID" type="string"
                                        class="form-control form-control-sm rounded-pill @error('national_id') is-invalid @enderror"
                                        name="national_id" value="{{ old('national_id') }}" required
                                        autocomplete="national_id" placeholder="{{ __('main.national_id')}}">
                                    <label for="floatingNationalID">{{ __('main.national_id')}}</label>
                                    @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating  col-12 col-md-6 mb-3">
                                    <input id="floatingPassword" type="string"
                                        class="form-control form-control-sm rounded-pill @error('password') is-invalid @enderror" name="password"
                                        value="{{ old('password') }}" required autocomplete="password"
                                        placeholder="{{ __('main.password')}}">
                                    <label for="floatingPassword">{{ __('main.password')}}</label>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating col-12 col-md-6 mb-3">
                                    <input id="floatingPassword" type="string"
                                        class="form-control form-control-sm rounded-pill @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation"
                                        placeholder="{{ __('main.password_confirmation')}}">
                                    <label for="floatingpassword_confirmation">{{ __('main.password_confirmation')}}</label>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-floating col-12  mb-3">
                                <button class="col-8 btn btn-outline-light rounded-pill btn-md px-5" type="submit">{{__('main.sginup')}}</button>
                            </div>
                                <div class="my-5 text-light" style="width: 100%; height: 20px; border-bottom: 1px solid white; text-align: center">
                                    <span style=" background-color: #212529; padding: 0 25px;" class="fw-bolder fs-4">
                                    {{__('main.or')}}
                                    </span>
                                  </div>
                                <div class=" d-flex justify-content-center my-2 row">
                                    <div class="col-12 col-md-6 mb-4">
                                        <a href="{{ route('auth.social',['social'=>App\Enums\SocialNetworksEnum::FACEBOOK]) }}"
                                            class=" my-2 login-with-facebook-btn text-decoration-none rounded-pill">
                                            <i class="fab fa-facebook-f fa-lg mx-1"></i> {{__('main.login_with_facebook')}}   
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-6  mb-3">
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
                            <p class="mb-0 text-light">{{ __('main.Do_you_already_have_an_account')}} <a
                                    href="{{route('login')}}" class="text-white-50 fw-bold">{{
                                    __('main.sginin')}}</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
