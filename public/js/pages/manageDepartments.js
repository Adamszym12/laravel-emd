$(document).ready(function() {
    let clickedDepartmentId;
    let manageDepartmentsTable = $('#manageDepartmentsTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "select": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "columns": [
            { "width": "0%" },
            { "width": "30%" },
            { "width": "57%" },
            { "width": "13%" },
        ],
        "columnDefs": [
            {
                "targets": 3,
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

    let addUsersToDepartmentTable = $('#addDepartmentsToUserTable').DataTable({
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
                "targets":[6]
            },
            {
                "targets": [ 0 ],
                "visible": false
            }
        ],
        select: {
            style:    'multi',
            selector: 'td:nth-child(6)'
        },
        order: [[ 1, 'asc' ]]

    });

    let tbody =  $('#manageDepartmentsTable tbody');

    // Edit department
    tbody.on( 'click', 'button[name=edit]', function () {
        let rowData = manageDepartmentsTable.row( $(this).parents('tr') ).data()
        $('#editDepartmentForm').attr('action', '/admin/manage/departments/'+rowData[0])
        $('#nameInput').val(rowData[1]);
        $('#descriptionInput').val(rowData[2]);
        $('#modalEditDepartment').modal('show');

    } );

    // Delete department
    tbody.on( 'click', 'button[name=delete]', function () {
        let DepartmentId = manageDepartmentsTable.row( $(this).parents('tr') ).data()[0]
        $('#hiddenModalDeleteDepartmentInput').val(DepartmentId);
        $('#modalDeleteDepartment').modal('show');
    } );

    // Add user
    tbody.on( 'click', 'button[name=addUser]', function () {
        clickedDepartmentId = manageDepartmentsTable.row( $(this).parents('tr') ).data()[0]
        addUsersToDepartmentTable.rows().deselect();
        $.get( "/admin/manage/department/get/users",{departmentId: clickedDepartmentId}, function( data ) {
            $(data[0]).each(function (index, value) {
                let row = addUsersToDepartmentTable.row('#'+value).select();

            })
        });
        $('#modalAddUserToDepartment').modal('show');
    });

    // Add users to department
    $('#submitAddUsersToDepartmentButton').on('click', function(e){
        let selectedRows = addUsersToDepartmentTable.rows({ selected: true }).data();
        let deselectedRows = addUsersToDepartmentTable.rows({ selected: false }).data();
        let data = {};
        let selectedIds = [];
        selectedRows.each(function (value, index){
            selectedIds.push(value[0]);
        });
        data.selectedIds = selectedIds;
        data.departmentId = clickedDepartmentId;
        $('#hiddenAddUsersToDepartmentInput').val(JSON.stringify(data))
        $('#addUsersToDepartmentForm').submit();
    });
});

