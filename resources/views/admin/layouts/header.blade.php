<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link d-flex align-items-center btn-clear-cache" href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }}">
                        <i class="ficon mr-50" data-feather="trash-2"></i>
                        <span>{{ __('Clear cache') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-language">
                <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if (Session::has('lang'))
                        <i class="flag-icon flag-icon-{{ Session::get('lang') == 'vi' ? 'vi' : 'us' }}"></i>
                        <span class="selected-language">{{ Session::get('lang') == 'vi' ? __('Vietnamese') : __('English') }}</span>
                    @else
                        <i class="flag-icon flag-icon-vi"></i>
                        <span class="selected-language">{{ __('Vietnamese') }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                    @if (Session::has('lang'))
                        <a class="dropdown-item" href="{{ route('lang', ['lang' => Session::get('lang') == 'vi' ? 'en' : 'vi']) }}">
                            <i class="flag-icon flag-icon-{{ Session::get('lang') == 'vi' ? 'us' : 'vi' }}"></i> 
                            {{ Session::get('lang') == 'vi' ? __('English') : __('Vietnamese') }}
                        </a>
                    @else
                        <a class="dropdown-item" href="{{ route('lang', ['lang' => 'en']) }}">
                            <i class="flag-icon flag-icon-us"></i> {{ __('English') }}
                        </a>
                    @endif
                </div>
            </li>
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            <li class="nav-item dropdown dropdown-cart mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="shopping-cart"></i><span class="badge badge-pill badge-primary badge-up cart-item-count">6</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                    <div class="dropdown-header d-flex">
                    <h4 class="notification-title mb-0 mr-auto">My Cart</h4>
                    <div class="badge badge-pill badge-light-primary">4 Items</div>
                    </div>
                </li>
                <li class="scrollable-container media-list">
                    <div class="media align-items-center"><img class="d-block rounded mr-1" src="{{ asset('app-assets/images/1.png') }}" alt="donuts" width="62">
                    <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                        <div class="media-heading">
                        <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> Apple watch 5</a></h6><small class="cart-item-by">By Apple</small>
                        </div>
                        <div class="cart-item-qty">
                        <div class="input-group">
                            <input class="touchspin-cart" type="number" value="1">
                        </div>
                        </div>
                        <h5 class="cart-item-price">$374.90</h5>
                    </div>
                    </div>
                    <div class="media align-items-center"><img class="d-block rounded mr-1" src="{{ asset('app-assets/images/7.png') }}" alt="donuts" width="62">
                    <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                        <div class="media-heading">
                        <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> Google Home Mini</a></h6><small class="cart-item-by">By Google</small>
                        </div>
                        <div class="cart-item-qty">
                        <div class="input-group">
                            <input class="touchspin-cart" type="number" value="3">
                        </div>
                        </div>
                        <h5 class="cart-item-price">$129.40</h5>
                    </div>
                    </div>
                    <div class="media align-items-center"><img class="d-block rounded mr-1" src="{{ asset('app-assets/images/2.png') }}" alt="donuts" width="62">
                    <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                        <div class="media-heading">
                        <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> iPhone 11 Pro</a></h6><small class="cart-item-by">By Apple</small>
                        </div>
                        <div class="cart-item-qty">
                        <div class="input-group">
                            <input class="touchspin-cart" type="number" value="2">
                        </div>
                        </div>
                        <h5 class="cart-item-price">$699.00</h5>
                    </div>
                    </div>
                    <div class="media align-items-center"><img class="d-block rounded mr-1" src="{{ asset('app-assets/images/3.png') }}" alt="donuts" width="62">
                    <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                        <div class="media-heading">
                        <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> iMac Pro</a></h6><small class="cart-item-by">By Apple</small>
                        </div>
                        <div class="cart-item-qty">
                        <div class="input-group">
                            <input class="touchspin-cart" type="number" value="1">
                        </div>
                        </div>
                        <h5 class="cart-item-price">$4,999.00</h5>
                    </div>
                    </div>
                    <div class="media align-items-center"><img class="d-block rounded mr-1" src="{{ asset('app-assets/images/5.png') }}" alt="donuts" width="62">
                    <div class="media-body"><i class="ficon cart-item-remove" data-feather="x"></i>
                        <div class="media-heading">
                        <h6 class="cart-item-title"><a class="text-body" href="app-ecommerce-details.html"> MacBook Pro</a></h6><small class="cart-item-by">By Apple</small>
                        </div>
                        <div class="cart-item-qty">
                        <div class="input-group">
                            <input class="touchspin-cart" type="number" value="1">
                        </div>
                        </div>
                        <h5 class="cart-item-price">$2,999.00</h5>
                    </div>
                    </div>
                </li>
                <li class="dropdown-menu-footer">
                    <div class="d-flex justify-content-between mb-1">
                    <h6 class="font-weight-bolder mb-0">Total:</h6>
                    <h6 class="text-primary font-weight-bolder mb-0">$10,999.00</h6>
                    </div><a class="btn btn-primary btn-block" href="app-ecommerce-checkout.html">Checkout</a>
                </li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-notification mr-25"><a class="nav-link" href="javascript:void(0);" data-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span class="badge badge-pill badge-danger badge-up">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                <li class="dropdown-menu-header">
                    <div class="dropdown-header d-flex">
                    <h4 class="notification-title mb-0 mr-auto">Notifications</h4>
                    <div class="badge badge-pill badge-light-primary">6 New</div>
                    </div>
                </li>
                <li class="scrollable-container media-list"><a class="d-flex" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                        <div class="media-left">
                        <div class="avatar"><img src="{{ asset('app-assets/images/avatar-s-15.jpg') }}" alt="avatar" width="32" height="32"></div>
                        </div>
                        <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!</p><small class="notification-text"> Won the monthly best seller badge.</small>
                        </div>
                    </div></a><a class="d-flex" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                        <div class="media-left">
                        <div class="avatar"><img src="{{ asset('app-assets/images/avatar-s-3.jpg') }}" alt="avatar" width="32" height="32"></div>
                        </div>
                        <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">New message</span>&nbsp;received</p><small class="notification-text"> You have 10 unread messages</small>
                        </div>
                    </div></a><a class="d-flex" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                        <div class="media-left">
                        <div class="avatar bg-light-danger">
                            <div class="avatar-content">MD</div>
                        </div>
                        </div>
                        <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">Revised Order 👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc. order updated</small>
                        </div>
                    </div></a>
                    <div class="media d-flex align-items-center">
                    <h6 class="font-weight-bolder mr-auto mb-0">System Notifications</h6>
                    <div class="custom-control custom-control-primary custom-switch">
                        <input class="custom-control-input" id="systemNotification" type="checkbox" checked="">
                        <label class="custom-control-label" for="systemNotification"></label>
                    </div>
                    </div><a class="d-flex" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                        <div class="media-left">
                        <div class="avatar bg-light-danger">
                            <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i></div>
                        </div>
                        </div>
                        <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">Server down</span>&nbsp;registered</p><small class="notification-text"> USA Server is down due to hight CPU usage</small>
                        </div>
                    </div></a><a class="d-flex" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                        <div class="media-left">
                        <div class="avatar bg-light-success">
                            <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i></div>
                        </div>
                        </div>
                        <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">Sales report</span>&nbsp;generated</p><small class="notification-text"> Last month sales report generated</small>
                        </div>
                    </div></a><a class="d-flex" href="javascript:void(0)">
                    <div class="media d-flex align-items-start">
                        <div class="media-left">
                        <div class="avatar bg-light-warning">
                            <div class="avatar-content"><i class="avatar-icon" data-feather="alert-triangle"></i></div>
                        </div>
                        </div>
                        <div class="media-body">
                        <p class="media-heading"><span class="font-weight-bolder">High memory</span>&nbsp;usage</p><small class="notification-text"> BLR Server using high memory</small>
                        </div>
                    </div></a>
                </li>
                <li class="dropdown-menu-footer"><a class="btn btn-primary btn-block" href="javascript:void(0)">Read all notifications</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ auth()->user()->email }}</span>
                        <span class="user-status">Admin</span>
                    </div>
                    <span class="avatar">
                        <img class="round" src="{{ asset('app-assets/images/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40">
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="page-profile.html"><i class="mr-50" data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href="app-email.html"><i class="mr-50" data-feather="mail"></i> Inbox</a>
                    <a class="dropdown-item" href="app-todo.html"><i class="mr-50" data-feather="check-square"></i> Task</a>
                    <a class="dropdown-item" href="app-chat.html"><i class="mr-50" data-feather="message-square"></i> Chats</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> Settings</a>
                    <a class="dropdown-item" href="page-pricing.html"><i class="mr-50" data-feather="credit-card"></i> Pricing</a>
                    <a class="dropdown-item" href="page-faq.html"><i class="mr-50" data-feather="help-circle"></i> FAQ</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item w-100 btn-outline-none"><i class="mr-50" data-feather="power"></i>{{ __('Logout') }}</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Files</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
            <div class="mr-75"><img src="{{ asset('app-assets/images/xls.png') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
            </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
            <div class="mr-75"><img src="{{ asset('app-assets/images/jpg.png') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
            </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
            <div class="mr-75"><img src="{{ asset('app-assets/images/pdf.png') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
            </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between w-100" href="app-file-manager.html">
        <div class="d-flex">
            <div class="mr-75"><img src="{{ asset('app-assets/images/doc.png') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
            </div>
        </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small></a></li>
    <li class="d-flex align-items-center"><a href="javascript:void(0);">
        <h6 class="section-label mt-75 mb-0">Members</h6></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
        <div class="d-flex align-items-center">
            <div class="avatar mr-75"><img src="{{ asset('app-assets/images/avatar-s-8.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
            </div>
        </div></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
        <div class="d-flex align-items-center">
            <div class="avatar mr-75"><img src="{{ asset('app-assets/images/avatar-s-1.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
            </div>
        </div></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
        <div class="d-flex align-items-center">
            <div class="avatar mr-75"><img src="{{ asset('app-assets/images/avatar-s-14.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
            </div>
        </div></a></li>
    <li class="auto-suggestion"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="app-user-view.html">
        <div class="d-flex align-items-center">
            <div class="avatar mr-75"><img src="{{ asset('app-assets/images/avatar-s-6.jpg') }}" alt="png" height="32"></div>
            <div class="search-data">
            <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
            </div>
        </div></a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a class="d-flex align-items-center justify-content-between w-100 py-50">
        <div class="d-flex justify-content-start"><span class="mr-75" data-feather="alert-circle"></span><span>No results found.</span></div></a></li>
</ul>
<!-- END: Header-->