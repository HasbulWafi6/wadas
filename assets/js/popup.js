const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    new Swal({
        title: 'Data Berhasil ' + flashData,
        text: 'Selamat Anda Sudah Berhasil Daftar',
        confirmButtonColor: '#34a5cf',
        type: 'success'
    });
}