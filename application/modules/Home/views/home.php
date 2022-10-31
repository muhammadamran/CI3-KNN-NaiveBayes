<!--**********************************Content body start***********************************-->
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <?php if ($this->session->flashdata('s_sigin')) : ?>
                    <div class="welcome">
                        <h5 class="card-welcome" style="text-transform: uppercase;">
                            <center>
                                <b>SELAMAT DATANG</b><br> <?= $this->session->userdata('NamaLengkap'); ?>
                            </center>
                        </h5>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************Content body end***********************************-->