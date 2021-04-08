<!DOCTYPE html>
<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Admin - Castro</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/favicon.ico') }}">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet"> --}}

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    
    <!-- BEGIN: Stack css -->
    @stack('css')
    <!-- END: Stack css -->

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/pickadate/pickadate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/bootstrap-extended.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/colors.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/components.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/bordered-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/themes/semi-dark-layout.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.min.cs') }}s">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/charts/chart-apex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.min.css',) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/pickers/form-pickadate.min.css',) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/animate/animate.min.css',) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css',) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/extensions/ext-component-sweet-alerts.min.css',) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css',) }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/colorpicker/bootstrap-colorpicker.min.css',) }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/style.css') }}">

  </head>

  <body class="vertical-layout vertical-menu-modern navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="">

    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    <div class="app-content content ">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">

        @yield('content')

      </div>
    </div>

    @include('admin.layouts.footer')
    
    <!-- Modal -->
    <div class="main-modal">
      <div class="modal fade text-left" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="mainModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
          </div>
        </div>
      </div>
    </div>

    <!-- loadding -->
    <div class="bg-overlay"></div>
    <div id="spin-loading" class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>

    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/ui/jquery.sticky.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js',) }}"></script>
    <script src="{{ asset('app-assets/colorpicker/bootstrap-colorpicker.min.js',) }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/cleave/cleave.min.js',) }}"></script>
    
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.min.js') }}"></script>

    <!-- BEGIN: Stack css -->
    @stack('js')
    <!-- END: Stack css -->
    
    <script src="{{ asset('app-assets/js/ajax.js') }}"></script>
    <script src="{{ asset('app-assets/js/my-script.js') }}"></script>

    <script>
      $(window).on('load',  function(){
        if (feather) {
          feather.replace({ width: 14, height: 14 });
        }
      })
    </script>
  </body>
  <!-- END: Body-->
</html>