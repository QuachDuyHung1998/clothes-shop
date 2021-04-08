<div class="modal-header">
    <h4 class="modal-title" id="mainModalLabel"><b>{{ __('Create category') }}</b></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="" method="post" class="default-form">
        <input id="id" type="hidden" name="id" value="{{ $category->id }}">
        <input id="status" type="hidden" name="status" value="{{ $category->status }}">
        <div class="form-group field-name required">
            <label class="control-label" for="name">{{ __('Category name') }} <span class="color-required">(*)</span></label>
            <div class="input-group input-group-merge">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </span>
                </div>
                <input type="text" id="name" class="form-control" name="name" autocomplete="off" placeholder="{{ __('Category name') }}" value="{{ $category->name }}">
            </div>
            <div class="help-block">@error('name') {{ $message }} @enderror</div>
        </div>
        <div class="form-group">
            <label class="control-label">{{ __('Category parent') }}</label>
            <select id="category_id" name="category_id" class="form-control select2">
                <option value="">{{ __('Choose category parent') }}</option>                    
                @foreach ($list_category as $itemCategory)
                    <option value="{{ $itemCategory->id }}" {{ $itemCategory->id === $category->category_id ? 'selected' : '' }}>{{ $itemCategory->name }}</option>                    
                @endforeach
            </select>
        </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn-update d-flex align-items-center">
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

        $(document).on("click", ".btn-update", function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");
            let id = $('#id').val();
            let name = $('#name').val();
            let category_id = $('#category_id').val();
            let status = $('#status').val();
            $('.box-spin').addClass('spinner-border mr-50');
            $.ajax({
                url: "/admin/ajax/edit-category",
                type: "POST",
                dataType: "JSON",
                data: {
                    id,
                    name,
                    category_id,
                    status,
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
                            if (category_id == '') {
                                $(`[data-key=${id}] td:first-child`).html(name);
                            } else {
                                $(`[data-key=${id}] td:first-child span`).html(name);
                            }
                            $(`[data-key=${id}] td:nth-child(2)`).html(result.category_name);

                            if ($("html").attr("lang") == "en") {
                                toastr["success"]("", "Update successfully", {
                                    closeButton: true,
                                    tapToDismiss: false,
                                    progressBar: true,
                                    rtl: false,
                                });
                            } else {
                                toastr["success"]("", "Cập nhật successfully", {
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