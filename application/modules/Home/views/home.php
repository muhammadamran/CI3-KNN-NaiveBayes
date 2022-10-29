<!--**********************************Content body start***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <style type="text/css">
                    .welcome {
                        padding: 10px 10px 10px 10px;
                        background: linear-gradient(45deg, #ff9859, #466fde, #fc8195, #4372fe);
                        margin-bottom: 10px;
                        border-radius: 10px;
                    }
                    .card-welcome {
                        margin-top: 4px;
                        margin-bottom: 2px;
                        color: #fff;
                    }
                </style>
                <?php if ($this->session->flashdata('s_sigin')) : ?>
                <div class="welcome">
                    <h5 class="card-welcome" style="text-transform: uppercase;">
                        <center>
                        <b>SELAMAT DATANG</b><br> <?= $this->session->userdata('NamaLengkap');?>
                        </center>
                    </h5>
                </div>
                <?php endif; ?>
                <div class="welcome">
                    <h5 class="card-welcome" style="text-transform: uppercase;">NAMA LENGKAP: <?= $this->session->userdata('NamaLengkap');?> &nbsp;|&nbsp; DEPARTEMEN: <?= $this->session->userdata('NamaDepartemen');?></h5>
                    <!-- <marquee><h5 class="card-welcome">BULOG</h5></marquee> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-5">
                    <div class="card-body">
                        <h3 class="card-title text-white">Total Pegawai</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_pegawai; ?></h2>
                            <p class="text-white mb-0">Update <?= tanggal_indo(date('Y-m-d')); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        <hr>
                        <?php if($this->session->userdata('Role') == 'Superadmin' || $this->session->userdata('Role') == 'Admin'){ ?>
                            <a href="<?= base_url('kepegawaian');?>" class="btn btn-sm mb-1 btn-warning"><i class="fa fa-eye"></i> Lihat detail</a>
                        <?php } else { ?>
                            <a href="#!Anda Bukan Admin" class="btn btn-sm mb-1 btn-warning" disabled="disabled"><i class="fa fa-eye"></i> Lihat detail</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data SPA</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_SPA; ?></h2>
                            <p class="text-white mb-0">Update <?= tanggal_indo(date('Y-m-d')); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-file"></i></span>
                        <hr>
                        <a href="<?= base_url('spa');?>" class="btn btn-sm mb-1 btn-info"><i class="fa fa-eye"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Delivery Order</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_DO; ?></h2>
                            <p class="text-white mb-0">Update <?= tanggal_indo(date('Y-m-d')); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-social-dropbox"></i></span>
                        <hr>
                        <button type="button" class="btn btn-sm mb-1 btn-danger" name="button"><i class="fa fa-eye"></i> Lihat detail</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Surat Jalan</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $total_SJ; ?></h2>
                            <p class="text-white mb-0">Update <?= tanggal_indo(date('Y-m-d')); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-envelope-open"></i></span>
                        <hr>
                        <button type="button" class="btn btn-sm mb-1 btn-primary" name="button"><i class="fa fa-eye"></i> Lihat detail</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************Content body end***********************************-->
