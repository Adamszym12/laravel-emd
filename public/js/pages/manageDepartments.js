$(document).ready(function() {
    let table = $('#manageDepartmentsTable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "columns": [
            { "width": "0%" },
            { "width": "30%" },
            { "width": "55%" },
            { "width": "10%" },
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
                    + '<button class="btn" name="delete"  type="button"><i class="fas fa-trash"></button>'
                    + '</div>'
            },
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    });

    let tbody =  $('#manageDepartmentsTable tbody');
    // edit department
    tbody.on( 'click', 'button[name=edit]', function () {
        let rowData = table.row( $(this).parents('tr') ).data()
        $('#hiddenModalEditDepartmentInput').val(rowData[0]);
        $('#nameInput').val(rowData[1]);
        $('#descriptionInput').val(rowData[2]);
        $('#modalEditDepartment').modal('show');

    } );
    // delete department
    tbody.on( 'click', 'button[name=delete]', function () {
        let DepartmentId = table.row( $(this).parents('tr') ).data()[0]
        $('#hiddenModalDeleteDepartmentInput').val(DepartmentId);
        $('#modalDeleteDepartment').modal('show');
    } );
});

