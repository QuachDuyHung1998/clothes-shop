$(window).on("load", function () {
    $(document).on("click", ".language", function () {
        let lang = $(this).attr("id");
        $.get("/ajax/language", { lang: lang }, function (data) {
            location.reload();
        });
    });

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
});
