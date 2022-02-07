
  $(document).ready(function(){
      $('#view').on('click', '.btn-form-ubah', function(){ // Ketika tombol dengan class btn-form-ubah pada div view di klik
        id = $(this).data('id') 
        $('#btn-ubah').show() // Munculkan tombol ubah dan checkbox foto
        // Set judul modal dialog menjadi Form Ubah Data
        $('#modal-title').html('Form Ubah data')
        var tr = $(this).closest('tr') // Cari tag tr paling terdekat
        var comment = tr.find('.comment-value').val() 
        var approver = tr.find('.approver-value').val()
        var user = tr.find('.user-value').val()

        $('#comment').val(comment) // Set value dari textbox nama yang ada di form
        $('#approver').val(approver)
        $('#user').val(user)
      }) 

    $('#view').on('click', '.btn-form-reject', function(){ // Ketika tombol dengan class btn-form-ubah pada div view di klik
        id = $(this).data('id') 
        $('#btn-reject').show() // Munculkan tombol ubah dan checkbox foto
        // Set judul modal dialog menjadi Form Ubah Data
        $('#modal-title').html('Form Reject data')
        var tr = $(this).closest('tr') // Cari tag tr paling terdekat
        var comment = tr.find('.comment-value').val() 
        var userreject = tr.find('.userreject-value').val()

        $('#comment_reject').val(comment) 
        $('#userreject').val(userreject)
      }) 


    $('#btn-ubah').click(function(){ 
    $.ajax({
      url: base_url + 'index.php/pmmc/tracking/ubah/' + id, // URL tujuan
      type: 'POST', // Tentukan type nya POST atau GET
      data: $("#form-modal form").serialize(), // Ambil semua data yang ada didalam tag form
      dataType: 'json',
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType('application/jsoncharset=UTF-8')
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
        if(response.status == 'sukses'){ // Jika Statusnya = sukses
          // Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
          $('#view').html(response.html)
          /*
          * Ambil pesan suksesnya dan set ke div pesan-sukses
          * Lalu munculkan div pesan-sukes nya
          * Setelah 10 detik, sembunyikan kembali pesan suksesnya
          */
          $('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()
          $('#form-modal').modal('hide') // Close / Tutup Modal Dialog
        }else{ // Jika statusnya = gagal
          /*
          * Ambil pesan errornya dan set ke div pesan-error
          * Lalu munculkan div pesan-error nya
          */
          $('#pesan-error').html(response.pesan).show()
        }
      }
    })
  })


     $('#btn-reject').click(function(){ 
    $.ajax({
      url: base_url + 'index.php/pmmc/tracking/reject/' + id, // URL tujuan
      type: 'POST', // Tentukan type nya POST atau GET
      data: $("#form-modal-reject form").serialize(), // Ambil semua data yang ada didalam tag form
      dataType: 'json',
      beforeSend: function(e) {
        if(e && e.overrideMimeType) {
          e.overrideMimeType('application/jsoncharset=UTF-8')
        }
      },
      success: function(response){ // Ketika proses pengiriman berhasil
        if(response.status == 'sukses'){ // Jika Statusnya = sukses
          // Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
          $('#view').html(response.html)
          /*
          * Ambil pesan suksesnya dan set ke div pesan-sukses
          * Lalu munculkan div pesan-sukes nya
          * Setelah 10 detik, sembunyikan kembali pesan suksesnya
          */
          $('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut()
          $('#form-modal-reject').modal('hide') // Close / Tutup Modal Dialog
        }else{ // Jika statusnya = gagal
          /*
          * Ambil pesan errornya dan set ke div pesan-error
          * Lalu munculkan div pesan-error nya
          */
          $('#pesan-error').html(response.pesan).show()
        }
      }
    })
  })

})