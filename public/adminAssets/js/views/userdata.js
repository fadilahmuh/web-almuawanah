$(document).ready(function () {
    var table = $('#datatable').DataTable();
    $index = 1;
    table.on('click', '.editModal', function(){

        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')) {
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#fname').val(data[1]);
        $('#emailAdmin').val(data[2]);
        $('#no_hpAdmin').val(data[3]);
        $('#editFormModal').attr('action', "/admin/userdata/"+data[0]);
        
        var elements = $(data[4]).text();
        console.log(elements);
        switch (elements) {
            case ' admin_yys':
            $index = 1;
            break;
            case ' admin_tka':
            $index = 2;
            break;
            case ' admin_ra':
            $index = 3;
            break;
            case ' admin_mts':
            $index = 4; 
            break;
            case ' admin_ma':
            $index = 5; 
            break;
            case ' admin_pst':
            $index = 6; 
            break;
            
            default:
            $index = 0;
            break;
        };
        $('select').prop('selectedIndex', $index).selectric('refresh');

    });
});
$('.del').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
    swal({
        title: `Hapus ${name}?`,
        text: "Jika Admin ini dihapus maka tidak dapat dikembalikan lagi.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        form.submit();
      }
    });
});