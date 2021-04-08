$(window).on("load", function () {
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

    function alertError(title, text) {
        Swal.fire({
            title,
            text,
            icon: "error",
            customClass: {
                confirmButton: "btn btn-primary",
            },
            showClass: {
                popup: "animate__animated animate__tada",
            },
            buttonsStyling: false,
            showCloseButton: true,
        });
    }

    $(document).on("click", ".update-status-category", function () {
        let id = $(this).attr("id");
        $.ajax({
            url: "/admin/ajax/update-status-category",
            type: "POST",
            dataType: "JSON",
            data: {
                id,
                _token: CSRF_TOKEN,
            },
            success: function (result) {
                if (result) {
                    if ($("html").attr("lang") == "en") {
                        toastr["success"]("", "Update successfuly", {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true,
                            rtl: false,
                        });
                    } else {
                        toastr["success"]("", "Cập nhật thành công", {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true,
                            rtl: false,
                        });
                    }
                }
            },
        });
    });

    $(document).on("click", ".btn-clear-cache", function () {
        $.ajax({
            url: "/admin/ajax/clear-cache",
            type: "POST",
            dataType: "JSON",
            data: {
                _token: CSRF_TOKEN,
            },
            success: function (result) {
                if (result) {
                    if ($("html").attr("lang") == "en") {
                        toastr["success"]("", "Cleared", {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true,
                            rtl: false,
                        });
                    } else {
                        toastr["success"]("", "Đã xóa", {
                            closeButton: true,
                            tapToDismiss: false,
                            progressBar: true,
                            rtl: false,
                        });
                    }
                }
            },
        });
    });

    $(document).on("click", ".btn-new-category", function () {
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
    });

    $(document).on("click", ".btn-edit-category", function () {
        let id = $(this).attr("data-id");
        $.ajax({
            url: `/admin/ajax/edit-category/${id}`,
            type: "GET",
            success: function (result) {
                if (result) {
                    // $('#mainModal .modal-dialog').addClass('modal-dialog-scrollable modal-lg');
                    $("#mainModal .modal-content").html(result);
                    $("#mainModal").modal("show");
                }
            },
        });
    });
});
