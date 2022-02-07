    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php $photo = $this->session->userdata('photo'); echo base_url('assets/images/logo.png') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('username'); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo site_url('admin');?>" <?php if($this->uri->segment(2) == "") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          
          <li class="nav-header">MASTER DATA</li>
          <li class="nav-item">
            <a href="<?php echo site_url('admin/users');?>" <?php if($this->uri->segment(2) == "users") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-user"></i>
              <p>Users</p>
            </a>
          </li >
          <li class="nav-item">
            <a href="<?php echo site_url('admin/perusahaan');?>" <?php if($this->uri->segment(2) == "perusahaan") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-address-book"></i>
              <p>Perusahaan</p>
            </a>
          </li >
          <li class="nav-item">
            <a href="<?php echo site_url('admin/items');?>" <?php if($this->uri->segment(2) == "items") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-cube"></i>
              <p>Barang</p>
            </a>
          </li >
          <li class="nav-item">
            <a href="<?php echo site_url('admin/kategori');?>" <?php if($this->uri->segment(2) == "kategori") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-bars"></i>
              <p>Kategori</p>
            </a>
          </li >
          <li class="nav-item">
            <a href="<?php echo site_url('admin/merk');?>" <?php if($this->uri->segment(2) == "merk") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-bookmark"></i>
              <p>Merk</p>
            </a>
          </li >

          
          <li class="nav-header">Transaksi</li>
          <li class="nav-item">
               <a href="<?php echo site_url('admin/penjualan');?>" <?php if($this->uri->segment(2) == "penjualan") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-file"></i>
              <p>Penjualan</p>
            </a>
          </li>
          
          <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
            <a href="<?php echo site_url('admin/laporan');?>" <?php if($this->uri->segment(2) == "laporan") {echo "class='nav-link active'";} else{echo "class='nav-link'";} ?>>
              <i class="nav-icon fas fa-print"></i>
              <p>Cetak Laporan</p>
            </a>
          </li >
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
