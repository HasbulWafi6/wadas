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
            <h1>Form Items</h1>
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
                <h3 class="card-title">Items</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card mb-3">
          <div class="card-header">
            <a href="<?php echo site_url('admin/items/add') ?>" class="btn btn-info"><i class="fas fa-plus"></i> Add New</a>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('update');?>"></div>
              <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('success');?>"></div>
              <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('delete');?>"></div>
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Merek</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  ?>
                  <?php foreach ($items as $itm): ?>
                  <tr>
                    <td width="150">
                      <?php echo $no++ ?>
                    </td>
                    <td width="150">
                      <?php echo $itm->kode_barang ?>
                    </td>
                    <td>
                      <?php echo $itm->nama_barang ?>
                    </td>
                    <td>
                      <?php echo $itm->kategori ?>
                    </td>
                    <td>
                      <?php echo $itm->merk ?>
                    </td>
                    <td>
                      <?php echo $itm->total_stok ?>
                    </td>
                    <td>
                      <?php echo $itm->harga ?>
                    </td>
                    <td width="250">
                      <a href="<?php echo site_url('admin/items/edit/'.$itm->id_barang) ?>"
                       class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                       <a href="<?php echo site_url('admin/items/delete/'.$itm->id_barang) ?>" class="btn btn-danger" role="button"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>

                </tbody>
              </table>
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

<script>
  function deleteConfirm(url){
    $('#btn-delete').attr('href', url);
    $('#deleteModal').modal();
  }
  </script>
</body>
    
</body>
</html>
