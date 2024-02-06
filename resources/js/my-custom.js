$(document).ready(function () {
    $("#tags").select2();

    // Photo Preview
    $('input[name="foto"]').change(function () {
        const input = this;
        const reader = new FileReader();

        reader.onload = function (e) {
            $("#photo-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    });

    // Function to go back
    function goBack() {
        window.history.back();
    }

    // Assign the goBack function to be called when the element with id "back-button" is clicked
    $("#back-button").click(goBack);

    // Thumbnail Preview
    $('input[name="thumbnail"]').change(function () {
        const input = this;
        const reader = new FileReader();

        reader.onload = function (e) {
            $("#thumbnail-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    });
});
