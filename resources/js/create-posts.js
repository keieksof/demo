$(document).ready(function () {
    $("#tags").select2();

    // Image Preview for Photo
    $("#photoInput").change(function () {
        readURL(this, "#photoPreview");
    });

    // Image Preview for Thumbnail
    $("#thumbnailInput").change(function () {
        readURL(this, "#thumbnailPreview");
    });

    function readURL(input, previewId) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $(previewId).attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
});
