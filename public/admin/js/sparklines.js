$(document).ready(function () {
    $("#select2-categories").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });

    $("#select2-tags").select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
});
