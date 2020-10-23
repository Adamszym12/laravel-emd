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
    let manageDepartmentsTable = $('#manageDepartmentsTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "select": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "columns": [
            {"width": "0%"},
            {"width": "30%"},
            {"width": "60%"},
            {"width": "0%"},
            {"width": "10%"},
        ],
        "columnDefs": [
            {
                "targets": 4,
                "className": 'dt-body-center',
                "orderable": false,
            },
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
        "columns": [],
        "columnDefs": [
            {
                "className": 'select-checkbox',
                "targets": [6],
                "orderDataType": 'dom-checkbox'
            },
        ],
        select: {
            style: 'multi',
            selector: 'td:nth-child(7)'
        },
        order: [[1, 'asc']]

    });

    let tbody = $('#manageDepartmentsTable tbody');

    // Delete user onclick button
    tbody.on('click', 'button[name=delete]', function () {
        let departmentId = this.value;
        $('#deleteDepartmentForm').attr('action', $('#hiddenDepartmentDeleteActionInput').val() + "/" + departmentId);
        $('#modalDeleteDepartment').modal('show');
    });


    // Edit department
    tbody.on('click', 'button[name=edit]', function () {
        let departmentId = this.value;
        $('#updateDepartmentForm').attr('action', $('#hiddenDepartmentUpdateActionInput').val() + "/" + departmentId);
        if ($('#idInput').val() !== departmentId) {
            let rowData = manageDepartmentsTable.row($(this).parents('tr')).data()
            $('#editDepartmentForm').attr('action', '/admin/manage/departments/' + rowData[0])
            $('#idInput').val(rowData[0]);
            $('#nameInput').val(rowData[1]);
            $('#descriptionInput').val(rowData[2]);
        }
        $('#modalEditDepartment').modal('show');

    });
    $('#updateDepartmentForm').submit(function (event) {
        event.preventDefault();
        departmentId = $('#idInput').val();
        name =  $('#nameInput').val();
        description = $('#descriptionInput').val();
        $.ajax({
            url: "/admin/departments/" + departmentId,
            method: "PUT",
            data: {
                name: name,
                description: description
            },
            success: function (response) {
                toastr.success(response.message)
                setTimeout(function(){
                    location.reload(true);
                }, 1000);
            },
            error: function (response) {
                let error = $.map(response.responseJSON.errors, function(value, index){
                    return [value];
                });
                toastr.error(error);
            }
        });
    })

    // Add user on click button
    tbody.on('click', 'button[name=addUser]', function () {
        let departmentId = this.value;
        $('#hiddenAddUsersToDepartmentInput').val(departmentId);
        manageDepartmentUsers.rows().deselect();
        $.get("/admin/departments/" + departmentId + "/users", function (data) {
            $(data[0]).each(function (index, value) {
                let row = manageDepartmentUsers.row('#' + value).select();
            });
            manageDepartmentUsers.order([6,'desc']).draw();
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
        $.ajax({
            url: "/admin/departments/" + departmentId + "/users",
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

