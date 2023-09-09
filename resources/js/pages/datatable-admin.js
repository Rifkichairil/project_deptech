function DatatableAdmin (url){
    var table = $('#admin-datatable').DataTable({
        processing: true,
        serverSide: true,
        // autoWidth: false,
        ajax: url,
        columns: [
            { data:'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data:'first_name', name:'first_name' },
            { data:'last_name', name:'last_name' },
            { data:'email', name:'email' },
            { data:'created_at', name:'created_at', orderable: false, searchable: false },
            { data:'action', name:'action' }
        ],
    })
}

window.adminEdit = function(url){
    console.log('testing edit');
    let forms = document.getElementById('editAdmin');
    $.ajax({
        url,
        type: 'GET',
        // data : { id : id },
        success: function(data){
            console.log(data);
            $('#edit_first_name').val(data.first_name)
            $('#edit_last_name').val(data.last_name)
            $('#edit_email  ').val(data.email)
            $('#editModalAdmin').modal('show');
            forms.action = url;
        },
        error: function(data){
            alert('gagal melakukan proses!');
        }
    })
}

window.DatatableAdmin = DatatableAdmin;
