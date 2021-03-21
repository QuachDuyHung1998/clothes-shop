<!-- main-footer -->
<footer class="main-footer">
    <div class="footer-top">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-12 footer-column">
                    <div class="footer-widget logo-widget">
                        <figure class="footer-logo"><a href="index.html"><img src="assets/images/footer-logo.png" alt=""></a></figure>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column">
                    <div class="footer-widget links-widget">
                        <div class="widget-title">
                            <h3>{{ __('Customer support') }}</h3>
                        </div>
                        <div class="widget-content">
                            <ul class="links-list clearfix">
                                <li><a href="#">Hướng dẫn chọn size</a></li>
                                <li><a href="#">Chính sách khách hàng thân thiết</a></li>
                                <li><a href="#">Chính sách đổi/trả</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Thanh toán, giao nhận</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 footer-column">
                    <div class="footer-widget contact-widget">
                        <div class="widget-title">
                            <h3>{{ __('Contact') }}</h3>
                        </div>
                        <ul class="info-list clearfix">
                            <li>{{ $configs['address'] ?? '' }}</li>
                            <li><a href="tel:{{ $configs['hotline'] ?? '' }}">{{ $configs['hotline_show'] ?? '' }}</a></li>
                            <li><a href="mailto:{{ $configs['email'] ?? '' }}">{{ $configs['email'] ?? '' }}</a></li>
                        </ul>
                        <ul class="footer-social clearfix">
                            <li><a href="{{ $configs['facebook'] ?? '' }}"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $configs['twitter'] ?? '' }}"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="{{ $configs['instagram'] ?? '' }}"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="{{ $configs['skype'] ?? '' }}"><i class="fab fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 footer-column">
                    <div class="footer-widget newsletter-widget">
                        <div class="widget-title">
                            <h3>{{ __('Newsletter') }}</h3>
                        </div>
                        <div class="widget-content">
                            <p>{{ $configs['address'] ?? ''}}</p>
                            <form action="contact.html" method="post" class="newsletter-form">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="{{ __('Enter your email') }}" required="">
                                    <button type="submit" class="theme-btn-two">{{ __('Subscribe') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container clearfix">
            <ul class="cart-list pull-left clearfix">
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-1.png') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-2.png') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-3.png') }}" alt=""></a></li>
                <li><a href="#"><img src="{{ asset('assets/images/resource/card-4.png') }}" alt=""></a></li>
            </ul>
            <div class="copyright pull-right">
                <p><a href="{{ route('site.home') }}">Castro</a> &copy; {{ date('Y') }} All Right Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->