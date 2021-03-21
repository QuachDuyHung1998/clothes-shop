@extends('site.layouts.main')

@section('content')
    <!-- myaccount-section -->
    <section class="myaccount-section pt-5">
        <div class="auto-container">
            <div class="row clearfix justify-content-center">
                <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box login-inner pt-5">
                        <h3 class="text-center mb-4">{{ __('Login') }}</h3>

                        @if (session('error'))
                            <div class="alert-danger text-center p-2 mb-4">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('login') }}" method="post" class="default-form">
                            @csrf
                            <div class="form-group">
                                <label class="@error('email') text-danger @enderror">{{ __('Email') }}</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="@error('email') border-danger @enderror">
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="@error('password') text-danger @enderror">{{ __('Password') }}</label>
                                <input type="password" name="password"  class="@error('password') border-danger @enderror">
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-controls-stacked">
                                    <label class="custom-control material-checkbox">
                                        <input type="checkbox" class="material-control-input">
                                        <span class="material-control-indicator"></span>
                                        <span class="description">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
                                <a href="my-account.html" class="recover-password">{{ __('Lost your password?') }}</a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="theme-btn-two">{{ __('Login') }}<i class="flaticon-right-1"></i></button>
                            </div>
                        </form>
                        <div class="lower-inner centred">
                            <span>{{ __('or login with') }}</span>
                            <ul class="social-links clearfix">
                                <li><a href="{{ route('facebook_login') }}"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                <li><a href="my-account.html"><i class="fab fa-google-plus-g"></i>Google</a></li>
                            </ul>
                            <p>{{ __('Do not have an account?') }} <a href="{{ route('register') }}" style="text-decoration: underline;">{{ __('Sign up Now') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- myaccount-section end -->
@endsection