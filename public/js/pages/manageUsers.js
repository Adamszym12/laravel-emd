$(document).ready(function () {
    // Setup csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.fn.dataTable.ext.order['dom-checkbox'] = function (settings, col) {
        return this.api().column(col, {order: 'index'}).nodes().map(function (td, i) {
            return $(td).closest('tr').hasClass('selected') ? '1' : '0';
        });
    }
    let table = $('#manageUsersTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columns": [
            {"width": "0%"},
            {"width": "15%"},
            {"width": "15%"},
            {"width": "15%"},
            {"width": "30%"},
            {"width": "12%"},
            {"width": "13%"},
        ],
        "columnDefs": [
            {
                "targets": 6,
                "className": 'dt-body-center',
                "orderable": false,
            },
        ]
    });

    let manageUserDepartments = $('#manageUserDepartments').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "rowId": "Id",
        "autoWidth": false,
        "columnDefs": [
            {
                "className": 'select-checkbox',
                "targets": 3,
                "orderDataType": 'dom-checkbox'
            },
        ],
        select: {
            style: 'multi',
            selector: 'td:nth-child(3)'
        },
    });

    let tbody = $('#manageUsersTable tbody');

    // Edit user onclick button
    tbody.on('click', 'button[name=edit]', function () {
        let userId = this.value;
        $('#updateUserForm').attr('action', $('#hiddenUserUpdateActionInput').val() + "/" + userId);
        let rowData = table.row($(this).parents('tr')).data()
        if ($('#idInput').val() !== userId) {
            $('#editUserForm').attr('action', '/admin/manage/users/' + rowData[0])
            $('#idInput').val(userId);
            $('#nameInput').val(rowData[1]);
            $('#surnameInput').val(rowData[2]);
            $('#emailInput').val(rowData[3]);
            $('#descriptionInput').val(rowData[4]);
            $('#phoneInput').val(rowData[5]);
        }
        $('#modalEditUser').modal('show');
    });
    $('#updateUserForm').submit(function (event) {
        event.preventDefault();
        userId = $('#idInput').val();
        let formData = new FormData(this);
        $.ajax({
            url: "/admin/users/" + userId,
            method: "post",
            contentType: false,
            processData: false,
            data: formData,
            success: function (response) {
                toastr.success(response.message)
                setTimeout(function () {
                    location.reload(true);
                }, 1000);
            },
            error: function (response) {
                let error = $.map(response.responseJSON.errors, function (value, index) {
                    return [value];
                });
                toastr.error(error);
            }
        });
    })

    // Delete user onclick button
    tbody.on('click', 'button[name=delete]', function () {
        let userId = this.value;
        $('#deleteUserForm').attr('action', $('#hiddenUserDeleteActionInput').val() + "/" + userId);
        $('#modalDeleteUser').modal('show');
    });

    // Add department  onclick button
    tbody.on('click', 'button[name=addUser]', function () {
        let userId = this.value;
        $('#hiddenAddDepartmentsToUserInput').val(userId);
        //deselect all rows
        manageUserDepartments.rows().deselect();
        $.get("/admin/users/" + userId + "/departments", function (data) {
            $(data[0]).each(function (index, value) {
                let row = manageUserDepartments.row('#' + value).select();
            });
            manageUserDepartments.order([3,'desc']).draw();
        });
        $('#modalAddUserToDepartment').modal('show');
    });

    // Add department to users
    $('#submitAddDepartmentsToUser').on('click', function (e) {
        let userId = $('#hiddenAddDepartmentsToUserInput').val();
        let selectedRows = manageUserDepartments.rows({selected: true}).data();
        let form = [];
        selectedRows.each(function (value, index) {
            form.push(value[0]);
        });
        $.ajax({
            url: "/admin/users/" + userId + "/departments",
            method: "POST",
            dataType: "json",
            data: JSON.stringify(form),
            success: function (response) {
                $('#modalAddUserToDepartment').modal('hide');
                toastr.success(response.message)
            },
            error: function (response) {
                let error = $.map(response.responseJSON.errors, function(value, index){
                    return [value];
                });
                toastr.error(error);
            }
        });
    });
});

