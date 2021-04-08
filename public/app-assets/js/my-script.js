$(document).ready(function () {
    // number format
    if ($(".numeral-price").length) {
        new Cleave($(".numeral-price"), {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }
    if ($(".numeral-price-dicount").length) {
        new Cleave($(".numeral-price-dicount"), {
            numeral: true,
            numeralThousandsGroupStyle: "thousand",
        });
    }

    // number format change
    $(".numeral-formatting").on("input", function () {
        $(this)
            .closest(".input-group")
            .find(".input-value-save")
            .val($(this).val().replace(/,/g, ""));
    });
    $(".numeral-formatting").keypress(function (event) {
        if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
            event.preventDefault(); //stop character from entering input
        }
    });

    let multiImgPreview = function (input, imgPreviewPlaceholder) {
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function (event) {
                    $($.parseHTML("<img>"))
                        .attr("src", event.target.result)
                        .appendTo(imgPreviewPlaceholder);
                };

                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $("#images").on("change", function () {
        multiImgPreview(this, "div.imgPreview");
    });
});
