@extends('admin.layouts.main')

@section('title', __('Products'))

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{ __('Categories') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Products') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12">
            <div class="form-group breadcrumb-right">
                <a href="{{ route('admin.product.create') }}" class="btn btn-primary">
                    <i data-feather='plus-circle' class="font-medium-1"></i>
                    <span>{{ __('New') }}</span>
                </a>
            </div>
        </div>
    </div>
    
    <div class="content-body">
        <div class="card card-company-table">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="list-category" class="table table-bordered vertical-top">
                        <thead>
                        <tr>
                            <th>{{ __('Product') }}</th>
                            <th>{{ __('SKU') }}</th>
                            <th>{{ __('Category') }}</th>
                            <th>{{ __('Price') }}</th>
                            <th>{{ __('Price discount') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="font-13">
                            @foreach ($products as $product)
                                <tr data-key="{{ $product->id }}">
                                    <td class="mw-500">
                                        <div class="d-md-flex d-block">
                                            <img class="w-90 h-100 mr-1" src="{{ $product->image }}">
                                            <div class="banner-content">
                                                <h5 class="mb-25 font-weight-bolder">{{ $product->name }}</h5>
                                                <div><span class="font-weight-bolder">{{ __('Description') }}:</span> {{ $product->description }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $product->sku }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ number_format($product->price, 0) }}</td>
                                    <td>{{ $product->price_discount ? number_format($product->price_discount, 0) : '' }}</td>
                                    <td>
                                        <div class="custom-control custom-control-primary custom-switch">
                                            <input id="{{ $product->id }}" type="checkbox" {{ $product->status === 1 ? 'checked' : '' }} class="custom-control-input update-status-category">
                                            <label class="custom-control-label" for="{{ $product->id }}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="btn-edit-category" href="javascript:void(0)" data-id="{{ $product->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('Edit') }}"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </a>
                                        <a href="{{ route('admin.product.delete', ['id' => $product->id]) }}" onclick="return confirm('Are you sure you want to delete this item?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-hover hover-danger font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('Delete') }}"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- {{ $products->links() }} --}}

            @if ($products->hasPages())
                <x-pagination :paginator="$products" />
            @endif
        </div>
    </div>
@endsection
