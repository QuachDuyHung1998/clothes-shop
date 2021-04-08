<div class="modal-header">
    <h4 class="modal-title" id="mainModalLabel"><b>{{ __('Create category') }}</b></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="form-group field-name required">
        <label class="control-label" for="name">{{ __('Category name') }} <span class="color-required">(*)</span></label>
        <div class="input-group input-group-merge">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </span>
            </div>
            <input type="text" id="name" class="form-control" name="name" autocomplete="off" placeholder="{{ __('Category name') }}">
        </div>
        <div class="help-block">@error('name') {{ $message }} @enderror</div>
    </div>
    <div class="form-group">
        <label class="control-label">{{ __('Category parent') }}</label>
        <select id="category_id" name="category_id" class="form-control select2">
            <option value="">{{ __('Choose category parent') }}</option>                    
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>                    
            @endforeach
        </select>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn-save d-flex align-items-center">
        <div class="box-spin" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <span>{{ __('Create') }}</span>
    </button>
    <button type="button" class="btn btn-danger btn-cancel-modal" data-dismiss="modal">{{ __('Cancel') }}</button>
</div>

<script>
    $(function() {
        $(".select2").each(function () {
            var $this = $(this);
            $this.wrap('<div class="position-relative"></div>');
            $this.select2({
                dropdownAutoWidth: true,
                width: "100%",
                dropdownParent: $this.parent(),
            });
        });

        $(document).on("click", ".btn-save", function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
            let name = $('#name').val();
            let category_id = $('#category_id').val();
            $('.box-spin').addClass('spinner-border mr-50');
            $.ajax({
                url: "/admin/ajax/new-category",
                type: "POST",
                dataType: "JSON",
                data: {
                    name,
                    category_id,
                    _token: CSRF_TOKEN,
                },
                success: function (result) {
                    if (result) {
                        $('.box-spin').removeClass('spinner-border mr-50');
                        if (result.error === 1) {
                            $('.field-name').addClass('has-error');
                            $('#name').attr('invalid', true);
                            $('.field-name .help-block').html(result.message.name[0]);
                        } else {
                            $('.btn-cancel-modal').click();
                            let td_name =  `<td class="font-weight-bolder">${name}</td>`;
                            if (category_id != '') {
                                td_name = `
                                    <td>
                                                    &nbsp;
                                                    &nbsp;
                                                    &nbsp;
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check font-medium-2 mr-50 font-rotate"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span>${name}</span>
                                    </td>
                                `;
                            }
                            let tag_tr = `
                                <tr data-key="${result.id}" role="row" class="odd">
                                    ${td_name}
                                    <td>${result.category_name}</td>
                                    <td>${category_id != '' ? '' : 0}</td>
                                    <td><?= date('H:i:s - d/m/Y') ?></td>
                                    <td>
                                        <div class="custom-control custom-control-primary custom-switch">
                                            <input id="${result.id}" type="checkbox" checked class="custom-control-input update-status-category">
                                            <label class="custom-control-label" for="${result.id}"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="Xem"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </a>
                                        <a class="btn-edit-category" href="javascript:void(0)" data-id="${result.id}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 icon-hover hover-success font-medium-2" data-toggle="tooltip" title="" data-original-title="Sửa"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </a>
                                        <a href="javascript:void(0)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-hover hover-danger font-medium-2" data-toggle="tooltip" title="" data-original-title="Xóa"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </a>
                                    </td>
                                </tr>
                            `;
                            if (category_id == '') {
                                $('#list-category tbody tr:first-child').before(tag_tr);
                            } else {
                                console.log($(`[data-key=${result.id}]`).html());
                                $(`[data-key=${category_id}]`).after(tag_tr);
                            }

                            if ($("html").attr("lang") == "en") {
                                toastr["success"]("", "Create successfully", {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                    rtl: false,
                                });
                            } else {
                                toastr["success"]("", "Thêm mới thành công", {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                    rtl: false,
                                });
                            }
                        }
                    }
                }
            });
        });
    });
</script>