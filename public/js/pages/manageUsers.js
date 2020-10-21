$(document).ready(function () {
    // Setup csrf token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
        "columns": [],
        "columnDefs": [
            {
                "className": 'select-checkbox',
                "orderable": false,
                "targets": [3]
            },
            {
                "targets": [0],
                "visible": false
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:nth-child(3)'
        },
        order: [[1, 'asc']]

    });

    let tbody = $('#manageUsersTable tbody');

    // Edit user onclick button
    tbody.on('click', 'button[name=edit]', function () {
        let userId = this.value;
        $('#updateUserForm').attr('action', $('#hiddenUserUpdateActionInput').val()+"/"+userId);
        if ($('#idInput').val() !== userId) {
            let rowData = table.row($(this).parents('tr')).data()
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

    // Delete user onclick button
    tbody.on('click', 'button[name=delete]', function () {
        let userId = this.value;
        $('#deleteUserForm').attr('action', $('#hiddenUserDeleteActionInput').val()+"/"+userId);
        $('#modalDeleteUser').modal('show');
    });

    // Add department  onclick button
    tbody.on('click', 'button[name=addUser]', function () {
        let userId = this.value;
        $('#hiddenAddDepartmentsToUserInput').val(userId);
        //deselect all rows
        manageUserDepartments.rows().deselect();
        $.get("/admin/users/"+userId+"/departments", function (data) {
            $(data[0]).each(function (index, value) {
                let row = manageUserDepartments.row('#' + value).select();
            });
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
            url: "/admin/users/"+userId+"/departments",
            method: "POST",
            dataType: "json",
            data: JSON.stringify(form),
            success:function(response) {
                $('#modalAddUserToDepartment').modal('hide');
                toastr.success(response)
            },
            error:function (data){
                toastr.error();
            }
        });
    });
});

