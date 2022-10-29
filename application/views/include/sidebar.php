<!--**********************************Sidebar start***********************************-->
<div class="nk-sidebar">
  <div class="nk-nav-scroll">
    <ul class="metismenu" id="menu">
      <li class="nav-label">NAVIGATION</li>
      <li class="<?= $this->uri->segment(1) == "home" ? "active" : ""; ?>">
        <a href="<?= base_url('home'); ?>" aria-expanded="false">
          <i class="icon-home"></i><span class="nav-text">Home</span>
        </a>
      </li>
      <li class="<?= $this->uri->segment(1) == "penyaluran" ? "active" : ""; ?>">
        <a href="<?= base_url('penyaluran'); ?>" aria-expanded="false">
          <i class="icon-eye"></i><span class="nav-text">Penyaluran</span>
        </a>
      </li>
      <?php if($this->session->userdata('Role') == 'Superadmin'){ ?>
        <li class="nav-label">Gudang</li>
        <li class="<?= $this->uri->segment(1) == "gudang" ? "active" : ""; ?>">
          <a href="<?= base_url('gudang/pengiriman'); ?>" aria-expanded="false">
            <i class="icon-globe-alt"></i><span class="nav-text">Gudang Pengirim</span>
          </a>
        </li>
      <?php } ?>
      <!-- ROLE : Superadmin, Admin, KaDivre, Pemkot, KepGudang, PTD -->
      <!-- PEMERINTAH KOTA BANDUNG -->
      <?php if($this->session->userdata('Role') == 'Pemkot'){ ?>
        <li class="nav-label">TRAKSAKSI</li>
        <li class="mega-menu mega-menu-sm <?= $this->uri->segment(1) == "spa" ? "active" : ""; ?>">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-doc"></i><span class="nav-text">SPA</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?= base_url ('spa'); ?>">Pembuatan SPA</a></li>
            <!-- <li><a href="<?= base_url ('spa/masuk'); ?>">SPA Masuk &nbsp;&nbsp; <span class="point"><?= $total_SPA; ?></span></a></li> -->
            <li><a class="<?= $this->uri->segment(1) == "spa" && $this->uri->segment(2) == "cetaks" ? "active" : ""; ?>" href="<?= base_url ('spa/cetak'); ?>">Cetak SPA</a></li>
          </ul>
        </li>
      <?php } ?>
      <!-- END PEMERINTAH KOTA BANDUNG -->
      <!-- KA DRIVE -->
      <?php if($this->session->userdata('Role') == 'KaDivre'){ ?>
        <li class="nav-label">TRAKSAKSI</li>
        <li class="mega-menu mega-menu-sm <?= $this->uri->segment(1) == "spa" ? "active" : ""; ?>">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-doc"></i><span class="nav-text">SPA</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?= base_url ('spa/masuk'); ?>">SPA Masuk &nbsp;&nbsp; <span class="point"><?= $total_SPA; ?></span></a></li>
          </ul>
        </li>
        <li class="mega-menu mega-menu-sm <?= $this->uri->segment(1) == "dorder" ? "active" : ""; ?>">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-social-dropbox"></i><span class="nav-text">Delivery Order</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?= base_url ('dorder'); ?>">Pembuatan Delivery Order</a></li>
            <!-- <li><a href="<?= base_url ('dorder/masuk'); ?>">Delivery Order Masuk &nbsp;&nbsp; <span class="point"><?= $total_DO; ?></span></a></li> -->
            <li><a class="<?= $this->uri->segment(2) == "cetaks" ? "active" : ""; ?>" href="<?= base_url ('dorder/cetak'); ?>">Cetak Delivery Order</a></li>
          </ul>
        </li>
      <?php } ?>
      <!-- END KA DRIVE -->
      <!-- KA GUDANG -->
      <?php if($this->session->userdata('Role') == 'KepGudang'){ ?>
        <li class="nav-label">TRAKSAKSI</li>
        <li class="mega-menu mega-menu-sm <?= $this->uri->segment(1) == "dorder" ? "active" : ""; ?>">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-social-dropbox"></i><span class="nav-text">Delivery Order</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?= base_url ('dorder/masuk'); ?>">Delivery Order Masuk &nbsp;&nbsp; <span class="point"><?= $total_DO; ?></span></a></li>
          </ul>
        </li>
        <li class="mega-menu mega-menu-sm <?= $this->uri->segment(1) == "suratjalan" ? "active" : ""; ?>">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-envelope"></i><span class="nav-text">Surat Jalan</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?= base_url ('suratjalan'); ?>">Pembuatan Surat Jalan</a></li>
            <li><a class="<?= $this->uri->segment(1) == "suratjalan" && $this->uri->segment(2) == "cetaks" ? "active" : ""; ?>" href="<?= base_url ('suratjalan/cetak'); ?>">Cetak Surat Jalan</a></li>
          </ul>
        </li>
        <li class="nav-label">Data Form</li>
        <li class="<?= $this->uri->segment(1) == "beras" && $this->uri->segment(2) != "masuk" && $this->uri->segment(2) != "defect" && $this->uri->segment(2) != "rekap" ? "active" : ""; ?>">
          <a href="<?= base_url('beras'); ?>" aria-expanded="false">
            <i class="icon-pin"></i><span class="nav-text">Beras</span>
          </a>
        </li>
        <li class="nav-label">Report Data Form</li>
        <li>
          <a class="has-arrow <?= $this->uri->segment(2) == "masuk" ? "active" : ""; ?>" href="javascript:void()" aria-expanded="false">
            <i class="icon-book-open"></i><span class="nav-text">Report</span>
          </a>
          <ul aria-expanded="false">
            <!-- <li><a href="<?= base_url ('beras/masuk'); ?>">Beras Masuk &nbsp;&nbsp; <span class="point">0</span></a></li> -->
            <li><a class="<?= $this->uri->segment(2) == "masuk" ? "active" : ""; ?>" href="<?= base_url ('beras/masuk'); ?>">Beras Masuk</a></li>
            <li><a class="<?= $this->uri->segment(2) == "defect" ? "active" : ""; ?>" href="<?= base_url ('beras/defect'); ?>">Beras Defect</a></li>
            <li><a class="<?= $this->uri->segment(2) == "rekap" ? "active" : ""; ?>" href="<?= base_url ('beras/rekap'); ?>">Rekap Beras</a></li>
          </ul>
        </li>
      <?php } ?>
      <!-- END KA GUDANG -->
      <!-- PETUGAS TITIK DISTRIBUSI -->
      <?php if($this->session->userdata('Role') == 'PTD'){ ?>
        <li class="<?= $this->uri->segment(1) == "pengiriman" ? "active" : ""; ?>">
          <a href="<?= base_url('pengiriman'); ?>" aria-expanded="false">
            <i class="icon-map"></i><span class="nav-text">Lihat Pengiriman</span>
          </a>
        </li>
        <li class="nav-label">Berita Acara</li>
        <li class="mega-menu mega-menu-sm <?= $this->uri->segment(1) == "beritaacara" ? "active" : ""; ?>">
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-envelope-letter"></i><span class="nav-text">Berita Acara</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?= base_url ('beritaacara'); ?>">Pembuatan Berita Acara</a></li>
            <li><a class="<?= $this->uri->segment(1) == "beritaacara" && $this->uri->segment(2) == "cetaks" ? "active" : ""; ?>" href="<?= base_url ('beritaacara/cetak'); ?>">Cetak Berita Acara</a></li>
          </ul>
        </li>
      <?php } ?>
      <!-- END PETUGAS TITIK DISTRIBUSI -->
      <!-- ONLY SUPERADMIN -->
      <?php if($this->session->userdata('Role') == 'Admin'){ ?>
        <li class="nav-label">SUPERADMIN SECTION</li>
        <li>
          <a class="has-arrow" href="javascript:void()" aria-expanded="false">
            <i class="icon-check"></i><span class="nav-text">Manajemen Data</span>
          </a>
          <ul aria-expanded="false">
            <li><a href="<?= base_url ('kepegawaian'); ?>">Manajemen Kepegawaian</a></li>
            <li><a href="<?= base_url ('departement'); ?>">Data Departement</a></li>
            <li><a href="<?= base_url ('gudang'); ?>">Data Gudang</a></li>
          </ul>
        </li>
      <?php } ?>
      <li class="nav-label">APLIKASI</li>
      <li class="<?= $this->uri->segment(1) == "tentang" ? "active" : ""; ?>">
        <a href="<?= base_url('tentang'); ?>" aria-expanded="false">
          <i class="icon-info"></i><span class="nav-text">Tentang Aplikasi</span>
        </a>
      </li>
    </ul>
  </div>
</div>
<!--**********************************Sidebar end***********************************-->
