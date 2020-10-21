$(document).ready(function () {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    if ($("#errorsHandlerDiv").length) {
        Toast.fire({
            icon: 'error',
            title: $("#errorsHandlerDiv").text(),
        });
    }
});
