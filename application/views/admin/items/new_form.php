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
            <h1>Form Barang</h1>
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
                <h3 class="card-title">Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card mb-3">
                <div class="card-header">
                  <a href="<?php echo site_url('admin/items/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
                <div class="card-body">
                  
                  <form action="<?= site_url('items/index_post') ?>" method="post" enctype="multipart/form-data">
                  <div class="form_error" style="color:red;text-align:center;margin-bottom:20px;">
                    <?php echo validation_errors(); ?>
                  </div>
                  <div class="form-group">
                    <label for="name">Kode Barang*</label>
                    <input class="form-control" type="text" name="kode_barang" placeholder="Kode Barang" />
                  </div>                  
                  <div class="form-group">
                    <label for="price">Nama Barang*</label>
                    <input class="form-control" type="text" name="nama_barang" min="0" placeholder="Nama Barang" />
                  </div>
                  <div class="form-group">
                    <label for="price">Kategori*</label>
                     <select required name="id_kategori_barang" class="form-control input-sm">
                        <option value="" disabled diselected>--Pilih Kategori --</option>
                          <?php                                
                          foreach ($kategori as $rowtm) {  
                        echo "<option value='".$rowtm->id_kategori_barang."'>".$rowtm->kategori."</option>";
                        }
                        echo"</select>";
                      ?>
                  </div>
                  <div class="form-group">
                    <label for="price">Merk*</label>
                     <select required name="id_merk_barang" class="form-control input-sm">
                        <option value="" disabled diselected>--Pilih Merk --</option>
                          <?php                                
                          foreach ($merk as $rowt) {  
                        echo "<option value='".$rowt->id_merk_barang."'>".$rowt->merk."</option>";
                        }
                        echo"</select>";
                      ?>
                  </div>   
                  <div class="form-group">
                    <label for="price">Stok*</label>
                    <input class="form-control" type="number" name="total_stok" min="0" placeholder="Stock" />
                  </div>
                  <div class="form-group">
                    <label for="price">Harga*</label>
                    <input class="form-control" type="number" name="harga" min="0" placeholder="Harga" />
                  </div>
                  <div class="form-group">
                    <label for="price">Keterangan</label>
                    <input class="form-control" type="text" name="keterangan" min="0" placeholder="Keterangan" />
                  </div>
                    <input type="submit" name="submit" value="Submit" class="btn btn-default">
                  </form>

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
