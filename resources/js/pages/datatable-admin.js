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

// window.adminEdit = function(url){
//     console.log('testing edit');
//     let forms = document.getElementById('editAdmin');
//     $.ajax({
//         url,
//         type: 'GET',
//         // data : { id : id },
//         success: function(data){
//             console.log(data);
//             $('#Editfullname').val(data.personal.fullname)
//             $('#Editemail').val(data.email)
//             $('#Editposition_id').val(data.position.name)
//             $('#Editphone').val(data.phone)
//             $('#Editktp_number').val(data.identity.ktp_number)
//             $('#Editnpwp_number').val(data.identity.npwp_number)
//             $('#Editreligion').val(data.personal.religion)
//             $('#Editplace_of_birth').val(data.personal.place_of_birth)
//             $('#Editdate_of_birth').val(data.personal.date_of_birth)
//             $('#Editgender').val(data.personal.gender)
//             $('#Editzipcode').val(data.personal.zipcode)
//             $('#Editaddress').val(data.personal.address)
//             $('#karyawanModalEdit').modal('show');
//             forms.action = url;
//         },
//         error: function(data){
//             alert('gagal melakukan proses!');
//         }
//     })
// }

window.DatatableAdmin = DatatableAdmin;
