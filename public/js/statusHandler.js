$(document).ready(function () {
    if ($('.toastrError').length) {
        toastr.error($('.toastrError').text())
    }
    if ($('.toastrSuccess').length) {
        toastr.success($('.toastrSuccess').text())
    }
});
