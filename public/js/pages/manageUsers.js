$(document).ready(function () {
    let clickedUserId;
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
            {
                "targets": [0],
                "visible": false
            }
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

    // edit user
    tbody.on('click', 'button[name=edit]', function () {
        let rowData = table.row($(this).parents('tr')).data()
        $('#editUserForm').attr('action', '/admin/manage/users/' + rowData[0])
        $('#nameInput').val(rowData[1]);
        $('#surnameInput').val(rowData[2]);
        $('#emailInput').val(rowData[3]);
        $('#descriptionInput').val(rowData[4]);
        $('#phoneInput').val(rowData[5]);
        $('#modalEditUser').modal('show');
    });

    // Add user
    tbody.on('click', 'button[name=addUser]', function () {
        clickedUserId = table.row($(this).parents('tr')).data()[0]
        manageUserDepartments.rows().deselect();
        $.get("/admin/manage/user/get/departments", {userId: clickedUserId}, function (data) {
            $(data[0]).each(function (index, value) {
                let row = manageUserDepartments.row('#' + value).select();

            })
        });
        $('#modalAddUserToDepartment').modal('show');
    });

    // delete user
    tbody.on('click', 'button[name=delete]', function () {
        let UserId = this.value;
        $('#deleteUserForm').attr('action', function () {
            return $(this).attr('action')+"/"+UserId;
        })
        console.log($('#deleteUserForm').attr('action'));
        //let deleteFormAttr = $('#deleteUserForm').attr('action');

        //deleteFormAttr = deleteFormAttr+"/"+UserId;
        //console.log( $('#deleteUserForm').attr('action'));
        //console.log(deleteFormAttr);
        $('#deleteUserForm').attr('action')
        $('#modalDeleteUser').modal('show');
    });

    // Add users to department
    $('#submitAddDepartmentsToUser').on('click', function (e) {
        let selectedRows = manageUserDepartments.rows({selected: true}).data();
        let data = {};
        let selectedIds = [];
        selectedRows.each(function (value, index) {
            selectedIds.push(value[0]);
        });
        data.selectedIds = selectedIds;
        data.userId = clickedUserId;
        $('#hiddenAddDepartmentsToUserInput').val(JSON.stringify(data))
        $('#addDepartmentsToUserForm').submit();
    });
});

