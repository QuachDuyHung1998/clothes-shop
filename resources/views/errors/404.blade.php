@extends('site.layouts.main')

@section('content')
    {{-- <section class="error-area pt-lg-5">
        <div class="container">
            <div class="error-content text-center">
                <img src="{{ asset('assets/images/404.png') }}" alt="image" />
                <h3 class="pt-lg-3">Oops - {{ __('Page Not Found!') }}</h3>
                <p style="max-width: 500px; margin: 0 auto;">{{ __('The page you are looking for might have been removed had its name changed or is temporarily unavailable.') }}</p>
                <a href="{{ route('site.home') }}" class="btn mt-lg-3" style="background-color: #ff4135; color: #fff;">{{ __('Go Back To Home')  }}</a>
            </div>
        </div>
    </section> --}}

    <section class="error-section centred sec-pad">
        <div class="auto-container">
            <div class="inner-box">
                <h1>404</h1>
                <h2>Oops! {{ __('Page Not Found!') }}</h2>
                <p style="max-width: 500px; margin: 0 auto 20px;">{{ __('The page you are looking for might have been removed had its name changed or is temporarily unavailable.') }}</p>
                <a href="index.html" class="theme-btn-two">{{ __('Go Back To Home')  }}<i class="flaticon-right-1"></i></a>
            </div>
        </div>
    </section>

    <script>
        setTimeout(function() {
            window.location.href = '{{ route('site.home') }}';
        }, 10000);
    </script>
@endsection