@extends('admin.layouts.main')

@section('title', __('Categories'))

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">{{ __('Categories') }}</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Categories') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12">
            <div class="form-group breadcrumb-right">
                <button type="button" class="btn btn-primary btn-new-category" data-toggle="modal" data-target="#mainModal">
                    <i data-feather='plus-circle' class="font-medium-1"></i>
                    <span>{{ __('New') }}</span>
                </button>
            </div>
        </div>
    </div>
    
    <div class="content-body">
        <div class="card card-company-table">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="list-category" class="table">
                    <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Parent') }}</th>
                        <th>{{ __('Total product') }}</th>
                        <th>{{ __('Created at') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody class="font-13">
                        @foreach ($categories as $category)
                            <tr data-key="{{ $category->id }}">
                                <td class="font-weight-bolder">{{ $category->name }}</td>
                                <td></td>
                                <td></td>
                                <td>{{ $category->created_at->format('H:i:s - d/m/Y') }}</td>
                                <td>
                                    <div class="custom-control custom-control-primary custom-switch">
                                        <input id="{{ $category->id }}" type="checkbox" {{ $category->status === 1 ? 'checked' : '' }} class="custom-control-input update-status-category">
                                        <label class="custom-control-label" for="{{ $category->id }}"></label>
                                    </div>
                                </td>
                                <td>
                                    <a class="view-category" href="javascript:void(0)">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('View') }}"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </a>
                                    <a class="btn-edit-category" href="javascript:void(0)" data-id="{{ $category->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('Edit') }}"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                    </a>
                                    <a href="{{ route('admin.category.delete', ['id' => $category->id]) }}" onclick="return confirm('Are you sure you want to delete this item?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-hover hover-danger font-medium-2" data-toggle="tooltip" title="" data-original-title="{{ __('Delete') }}"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </a>
                                </td>
                            </tr>
                            @foreach ($category->childrenCategories as $childCategory)
                                @include('admin.category.child_category', [
                                    'child_category' => $childCategory,
                                    'parentCategoryName' => $category->name,
                                    'deep' => 1
                                ])
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </div>

    @push('css')
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    @endpush
    
    @push('js')
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
        <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>

        <script>
            $(function () {
                $.ajax({
                    url: "/admin/ajax/new-category",
                    type: "GET",
                    success: function (result) {
                        if (result) {
                            // $('#mainModal .modal-dialog').addClass('modal-dialog-scrollable modal-lg');
                            $("#mainModal .modal-content").html(result);
                        }
                    },
                });

                $('#list-category').DataTable({
                    ordering: false,
                    pageLength: 25,
                    aLengthMenu: [
                        [10, 25, 50, 100, 200, -1],
                        [10, 25, 50, 100, 200, "All"]
                    ],
                    iDisplayLength: -1,
                    dom:
                        '<"d-flex justify-content-between align-items-center header-actions mx-1 row mt-75"' +
                        '<"col-lg-12 col-xl-6" l>' +
                        '<"col-lg-12 col-xl-6 pl-xl-75 pl-0"<"dt-action-buttons text-xl-right text-lg-left text-md-right text-left d-flex align-items-center justify-content-lg-end align-items-center flex-sm-nowrap flex-wrap mr-50"<f>>>' +
                        '>t' +
                        '<"d-flex justify-content-between mx-2 row mb-1"' +
                        '<"col-sm-12 col-md-6"i>' +
                        '<"col-sm-12 col-md-6"p>' +
                        '>',
                    language: {
                        sLengthMenu: '{{ __('Show') }} _MENU_ {{ __('entries') }}',
                        info: '<label>{{ __('Showing') }} _START_ {{ __('to') }} _END_ {{ __('of') }} _TOTAL_ {{ __('entries') }}</label>',
                        infoEmpty: "<label>{{ __('Showing') }} 0 {{ __('to') }} 0 {{ __('of') }} 0 {{ __('entries') }}</label>",
                        emptyTable: '{{ __('No data available in table.') }}',
                        infoFiltered: '<label>({{ __('filtered from') }} _MAX_ {{ __('total entries') }})</label>',
                        zeroRecords: '<div class="p-1">{{ __('No matching records found.') }}</div>',
                        search: '{{ __('Search') }}:',
                        searchPlaceholder: '{{ __('Enter keyword') }}...',
                        paginate: {
                            previous: '&nbsp;',
                            next: '&nbsp;'
                        }
                    },
                });
            });

        </script>
    @endpush

@endsection
