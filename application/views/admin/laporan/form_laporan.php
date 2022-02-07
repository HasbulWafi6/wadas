<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("admin/layout/head.php") ?>
</head>



<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php $this->load->view("admin/layout/navbar.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <?php $this->load->view("admin/layout/sidebar.php") ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
     <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Laporan Penjualan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Laporan Penjualan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card mb-3">
          <div class="card-body">

            <div class="table-responsive">
              <div class="panel-body">

				<?php echo form_open('laporan', array('id' => 'FormLaporan')); ?>
				<div class="row">
					<div class="col-sm-5">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">Dari Tanggal</label>
								<div class="col-sm-8">
									<input type='text' name='from' class='form-control' id='tanggal_dari' value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">Sampai Tanggal</label>
								<div class="col-sm-8">
									<input type='text' name='to' class='form-control' id='tanggal_sampai' value="<?php echo date('Y-m-d'); ?>">
								</div>
							</div>
						</div>
					</div>
				</div>	

				<div class='row'>
					<div class="col-sm-5">
						<div class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-4"></div>
								<div class="col-sm-8">
									<button type="submit" class="btn btn-primary" style='margin-left: 0px;'>Tampilkan</button>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>

				<br />
				<div id='result'></div>
			</div>
              
            </div>
          </div>
        </div>
                
                
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
          
              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  
  <!-- /.content-wrapper -->
  <?php $this->load->view("admin/layout/footer.php") ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php $this->load->view("admin/layout/modal.php") ?>
<?php $this->load->view("admin/layout/js.php") ?>
<link rel="stylesheet" href="<?php echo base_url('assets/datetimepicker/jquery.datetimepicker.css') ?>">
<script src="<?php echo base_url('assets/datetimepicker/jquery.datetimepicker.js') ?>"></script>
<script>
$('#tanggal_dari').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d',
	closeOnDateSelect:true
});
$('#tanggal_sampai').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'Y-m-d',
	closeOnDateSelect:true
});

$(document).ready(function(){
	$('#FormLaporan').submit(function(e){
		e.preventDefault();

		var TanggalDari = $('#tanggal_dari').val();
		var TanggalSampai = $('#tanggal_sampai').val();

		if(TanggalDari == '' || TanggalSampai == '')
		{
			$('.modal-dialog').removeClass('modal-lg');
			$('.modal-dialog').addClass('modal-sm');
			$('#ModalHeader').html('Oops !');
			$('#ModalContent').html("Tanggal harus diisi !");
			$('#ModalFooter').html("<button type='button' class='btn btn-primary' data-dismiss='modal' autofocus>Ok, Saya Mengerti</button>");
			$('#ModalGue').modal('show');
		}
		else
		{
			var URL = "<?php echo site_url('admin/laporan/penjualan'); ?>/" + TanggalDari + "/" + TanggalSampai;
			$('#result').load(URL);
		}
	});
});
</script>
</body>
    
</body>
</html>