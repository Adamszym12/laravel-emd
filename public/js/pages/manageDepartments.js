$(document).ready(function() {
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
                "className": 'dt-body-center',
                "orderable": false,
            },
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    });

    let manageDepartmentUsers = $('#manageDepartmentUsers').DataTable({
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

    // Delete user onclick button
    tbody.on('click', 'button[name=delete]', function () {
        let departmentId = this.value;
        $('#deleteDepartmentForm').attr('action', $('#hiddenDepartmentDeleteActionInput').val()+"/"+departmentId);
        $('#modalDeleteDepartment').modal('show');
    });


    // Edit department
    tbody.on( 'click', 'button[name=edit]', function () {
        let departmentId = this.value;
        $('#updateDepartmentForm').attr('action', $('#hiddenDepartmentUpdateActionInput').val()+"/"+departmentId);
        let rowData = manageDepartmentsTable.row( $(this).parents('tr') ).data()
        $('#editDepartmentForm').attr('action', '/admin/manage/departments/'+rowData[0])
        $('#nameInput').val(rowData[1]);
        $('#descriptionInput').val(rowData[2]);
        $('#modalEditDepartment').modal('show');

    } );

    // Add user on click button
    tbody.on( 'click', 'button[name=addUser]', function () {
        let departmentId = this.value;
        $('#hiddenAddUsersToDepartmentInput').val(departmentId);
        manageDepartmentUsers.rows().deselect();
        $.get("/admin/users/"+departmentId+"/departments", function (data) {
            $(data[0]).each(function (index, value) {
                let row = manageDepartmentUsers.row('#' + value).select();
            });
        });
        $('#modalAddUserToDepartment').modal('show');
    });

    // Add users to department
    $('#submitAddUsersToDepartment').on('click', function (e) {
        let departmentId = $('#hiddenAddUsersToDepartmentInput').val();
        let selectedRows = manageDepartmentUsers.rows({selected: true}).data();
        let form = [];
        selectedRows.each(function (value, index) {
            form.push(value[0]);
        });
        console.log(form)
        $.ajax({
            url: "/admin/departments/"+departmentId+"/users",
            method: "POST",
            dataType: "json",
            data: JSON.stringify(form),
            success:function(data) {
                location.reload();
            }
        });
    });
});

