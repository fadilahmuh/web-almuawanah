$('.dropify').dropify({
    messages: {
        'default': 'Tarik dan lepaskan file atau klik disini',
        'replace': 'Tarik dan lepaskan file atau klik disini untuk mengganti',
        'remove':  'Remove',
        'error':   'Ooops, kesalahan terjadi.'
    }
  }); 

  $(document).on("click", ".edit", function(e) {
  e.preventDefault();
  var id = $(this).data("id");
  var route = $(this).data("url");
  $.ajax({
    type: 'GET',
    url: route,
    data: {
        id: id,
    },
    dataType: "json",
    success: function(response) {
      $('#EditGaleri').html(response.modal);
      $('#EditGaleri').modal('show');
    },
    error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
  });
});

$('.del').click(function(event) {
    var form =  $(this).closest("form");
    event.preventDefault();
    swal({
        title: `Hapus Foto yang dipilih?`,
        text: "Jika Foto ini dihapus maka tidak dapat dikembalikan lagi.",
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

  $(document).on("click", ".edit2", function(e) {
    e.preventDefault();
    var inputs = $(this).parent().parent().parent().find(":input:not(:button)");
    inputs.removeAttr('disabled');
  });

  $(document).on("click", ".cancel", function(e) {
    e.preventDefault();
    var inputs = $(this).parent().parent().parent().find(":input:not(:button)");
    inputs.prop('disabled', true);
  });

  $('.save').click(function(event) {
      var form =  $(this).closest("form");
      event.preventDefault();
      swal({
          title: `Simpan hasil edit youtube ?`,          
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