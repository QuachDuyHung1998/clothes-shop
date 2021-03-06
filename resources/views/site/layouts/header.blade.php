<!-- main header -->
<header class="main-header">
    <div class="header-top">
        <div class="auto-container">
            <div class="top-inner clearfix">
                <div class="top-left pull-left">
                    <ul class="info clearfix">
                        <li><i class="flaticon-email"></i><a href="mailto:{{ $configs['email'] ?? '' }}">{{ $configs['email'] ?? '' }}</a></li>
                        <li><i class="flaticon-call"></i><a href="tel:+{{ $configs['hotline'] ?? '' }}">{{ $configs['hotline_show'] ?? '' }}</a></li>
                    </ul>
                </div>
                <div class="top-right pull-right">
                    <ul class="social-links clearfix">
                        <li><a href="{{ $configs['facebook'] ?? '' }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{ $configs['twitter'] ?? '' }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="{{ $configs['instagram'] ?? '' }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ $configs['skype'] ?? '' }}" target="_blank"><i class="fab fa-skype"></i></a></li>
                    </ul>
                    <div class="language">
                        <div class="lang-btn">
                            <span class="flag"><img src="{{ asset('assets/images/icons/'.(Session::has('lang') ? Session::get('lang') : 'vi').'.png') }}" alt="" title="English"></span>
                            @if (Session::has('lang'))
                                <span class="txt">{{ Session::get('lang') == 'vi' ? __('Vietnamese') : __('English') }}</span>
                            @else
                                <span class="txt">{{ __('Vietnamese') }}</span>
                            @endif                            
                            <span class="arrow fa fa-angle-down"></span>
                        </div>
                        <div class="lang-dropdown">
                            <ul>
                                @if (Session::has('lang'))
                                    <li><a href="{{ route('lang', ['lang' => Session::get('lang') == 'vi' ? 'en' : 'vi']) }}">
                                        <span class="flag flag-custom"><img src="{{ asset('assets/images/icons/'.(Session::get('lang') == 'vi' ? 'en' : 'vi').'.png') }}" alt="" title="English"></span>
                                        <span>{{ Session::get('lang') == 'vi' ? __('English') : __('Vietnamese') }}</span>
                                    </a></li>
                                @else
                                    <li><a href="{{ route('lang', ['lang' => 'en']) }}">
                                        <span class="flag flag-custom"><img src="{{ asset('assets/images/icons/en.png') }}" alt="" title="English"></span>
                                        <span>{{ __('English') }}</span>
                                    </a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="price-box">                        
                        @auth
                            <span>{{ auth()->user()->name }}</span>
                            <ul class="price-list clearfix">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit"><i class="fas fa-sign-out-alt"></i></button>
                                    </form>
                                </li>
                            </ul>
                        @endauth
                        
                        @guest
                            <span>{{ __('Account') }}</span>
                            <ul class="price-list clearfix">
                                <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-lower">
        <div class="auto-container">
            <div class="outer-box">
                <figure class="logo-box"><a href="{{ route('site.home') }}"><img src="{{ $configs['logo'] ?? '' }}" alt=""></a></figure>
                <div class="menu-area">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="current"><a href="{{ route('site.home') }}">{{ __('Home') }}</a></li>

                                @isset($categories)
                                    @foreach ($categories as $category)
                                        @if ($category->is_children)
                                            <li class="dropdown"><a href="{{ $category->slug }}">{{ $category->name }}</a>
                                                <ul>
                                                    @foreach ($category->childrenCategories as $childCategory)
                                                        <li><a href="{{ $childCategory->slug }}">{{ $childCategory->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li class="dropdown"><a href="{{ $category->slug }}">{{ $category->name }}</a>
                                                <div class="megamenu">
                                                    <div class="row clearfix">
                                                        @foreach ($category->childrenCategories as $childCategory)
                                                            <div class="col-lg-3 column">
                                                                <ul>
                                                                    <li><a href="{{ $childCategory->slug }}">{{ $childCategory->name }}</a></li>
                                                                </ul>
                                                            </div>                                       
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                @endisset

                                @isset($menu)
                                    @foreach ($menu as $item)
                                        <li><a href="{{ $item->url }}">{{ $item->name }}</a></li>
                                    @endforeach
                                @endisset
                            </ul>
                        </div>
                    </nav>
                </div>
                <ul class="menu-right-content clearfix">
                    <li>
                        <div class="search-btn">
                            <button type="button" class="search-toggler"><i class="flaticon-search"></i></button>
                        </div>
                    </li>
                    <li><a href="index.html"><i class="flaticon-like"></i></a></li>
                    <li class="shop-cart">
                        <a href="shop.html"><i class="flaticon-shopping-cart-1"></i><span>3</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="logo-box pull-left">
                    <figure class="logo"><a href="{{ route('site.home') }}"><img src="{{ $configs['logo_small'] ?? '' }}" alt=""></a></figure>
                </div>
                <div class="menu-area pull-right">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    <nav class="menu-box">
        <div class="nav-logo"><a href="index.html"><img src="{{ $configs['logo_2'] ?? '' }}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>{{ __('Contact Info') }}</h4>
            <ul>
                <li>{{ $configs['address'] ?? '' }}</li>
                <li><a href="tel:+{{ $configs['hotline'] ?? '' }}">{{ $configs['hotline_show'] ?? '' }}</a></li>
                <li><a href="mailto:{{ $configs['email'] ?? '' }}">{{ $configs['email'] ?? '' }}</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="{{ $configs['facebook'] ?? '' }}"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="{{ $configs['twitter'] ?? '' }}"><span class="fab fa-twitter"></span></a></li>
                <li><a href="{{ $configs['instagram'] ?? '' }}"><span class="fab fa-instagram"></span></a></li>
                <li><a href="{{ $configs['skype'] ?? '' }}"><span class="fab fa-skype"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->