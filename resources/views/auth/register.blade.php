@extends('site.layouts.main')

@section('content')
    <!-- myaccount-section -->
    <section class="myaccount-section pt-5">
        <div class="auto-container">
            <div class="row clearfix justify-content-center">
                <div class="col-lg-6 col-md-12 col-sm-12 inner-column">
                    <div class="inner-box signup-inner pt-5">
                        <h3 class="text-center mb-4">{{ __('Sign Up') }}</h3>

                        <form action="{{ route('register') }}" method="post" class="default-form">
                            @csrf
                            <div class="form-group">
                                <label class="@error('name') text-danger @enderror">{{ __('Your name') }}</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="@error('name') border-danger @enderror">
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="@error('email') text-danger @enderror">{{ __('Email') }}</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="@error('email') border-danger @enderror">
                                @error('email')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="@error('password') text-danger @enderror">{{ __('Password') }}</label>
                                <input type="password" name="password" class="@error('password') border-danger @enderror">
                                @error('password')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="@error('password_confirmation') text-danger @enderror">{{ __('Repeat password') }}</label>
                                <input type="password" name="password_confirmation" class="@error('password_confirmation') border-danger @enderror">
                                @error('password_confirmation')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="theme-btn-two">{{ __('Sign Up') }}<i class="flaticon-right-1"></i></button>
                            </div>
                        </form>
                        <div class="centred">
                            <p>{{ __('You already have an account?') }} <a href="{{ route('register') }}" style="text-decoration: underline;">{{ __('Log In Now') }}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- myaccount-section end -->
@endsection