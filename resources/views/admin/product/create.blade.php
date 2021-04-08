@extends('admin.layouts.main')

@section('title', __('New product'))

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{ __('Products') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.product') }}">{{ __('Products') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('New') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="content-body">
        <div class="card card-company-table">
            <div class="card-body">
                @include('admin.product._form', [
                    'list_category' => $list_category
                ])
            </div>
        </div>
    </div>
@endsection
