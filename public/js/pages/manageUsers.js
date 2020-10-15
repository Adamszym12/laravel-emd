$(document).ready(function() {
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
            { "width": "15%" },
            { "width": "10%" },
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
                    + '<button class="btn" name="delete"  type="button"><i class="fas fa-trash"></button>'
                    + '</div>'
            },
            {
                "targets": [ 0 ],
                "visible": false
            }
        ]
    });

    let tbody =  $('#manageUsersTable tbody');
    // edit user
    tbody.on( 'click', 'button[name=edit]', function () {
        let rowData = table.row( $(this).parents('tr') ).data()
        $('#hiddenModalEditUserInput').val(rowData[0]);
        $('#nameInput').val(rowData[1]);
        $('#descriptionInput').val(rowData[2]);
        $('#modalEditUser').modal('show');

    } );
    // delete user
    tbody.on( 'click', 'button[name=delete]', function () {
        let UserId = table.row( $(this).parents('tr') ).data()[0]
        $('#hiddenModalDeleteUserInput').val(UserId);
        $('#modalDeleteUser').modal('show');
    } );
});

