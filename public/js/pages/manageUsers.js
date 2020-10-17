$(document).ready(function() {
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
            { "width": "0%" },
            { "width": "15%" },
            { "width": "15%" },
            { "width": "15%" },
            { "width": "30%" },
            { "width": "12%" },
            { "width": "13%" },
        ],
        "columnDefs": [
            {
                "targets": 6,
                "data": null,
                "className": 'dt-body-center',
                "orderable": false,
                "defaultContent":
                    '<div class="row  justify-content-around">'
                    + '<button class="btn" name="edit" type="button"><i class="fas fa-edit"></i></button>'
                    + '<button class="btn" name="addUser" type="button"><i class="fas fa-user-plus"></i></button>'
                    + '<button class="btn" name="delete"  type="button"><i class="fas fa-trash"></button>'
                    + '</div>'
            },
            {
                "targets": [ 0 ],
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
        "columns": [
        ],
        "columnDefs": [
            {
                "className": 'select-checkbox',
                "orderable": false,
                "targets":[3]
            },
            {
                "targets": [ 0 ],
                "visible": false
            }
        ],
        select: {
            style:    'multi',
            selector: 'td:nth-child(3)'
        },
        order: [[ 1, 'asc' ]]

    });

    let tbody =  $('#manageUsersTable tbody');

    // edit user
    tbody.on( 'click', 'button[name=edit]', function () {
        let rowData = table.row( $(this).parents('tr') ).data()
        $('#editUserForm').attr('action', '/admin/manage/users/'+rowData[0])
        $('#nameInput').val(rowData[1]);
        $('#surnameInput').val(rowData[2]);
        $('#emailInput').val(rowData[3]);
        $('#descriptionInput').val(rowData[4]);
        $('#phoneInput').val(rowData[5]);
        $('#modalEditUser').modal('show');
    } );

    // Add user
    tbody.on( 'click', 'button[name=addUser]', function () {
        clickedUserId = table.row( $(this).parents('tr') ).data()[0]
        manageUserDepartments.rows().deselect();
        $.get( "/admin/manage/user/get/departments",{userId: clickedUserId}, function( data ) {
            $(data[0]).each(function (index, value) {
                let row = manageUserDepartments.row('#'+value).select();

            })
        });
        $('#modalAddUserToDepartment').modal('show');
    });

    // delete user
    tbody.on( 'click', 'button[name=delete]', function () {
        let UserId = table.row( $(this).parents('tr') ).data()[0]
        $('#deleteUserForm').attr('action', '/admin/manage/users/'+UserId)
        $('#modalDeleteUser').modal('show');
    } );

    // Add users to department
    $('#submitAddDepartmentsToUser').on('click', function(e){
        let selectedRows = manageUserDepartments.rows({ selected: true }).data();
        let deselectedRows = manageUserDepartments.rows({ selected: false }).data();
        let data = {};
        let selectedIds = [];
        let deselectedIds = [];
        selectedRows.each(function (value, index){
            selectedIds.push(value[0]);
        });
        deselectedRows.each(function (value, index){
            deselectedIds.push(value[0]);
        });
        data.selectedIds = selectedIds;
        data.deselectedIds = deselectedIds;
        data.userId = clickedUserId;
        $('#hiddenAddDepartmentsToUserInput').val(JSON.stringify(data))
        $('#addDepartmentsToUserForm').submit();
    });
});

