<?= $this->extend('user/layout') ?>
<?= $this->section('content') ?>

<?= session()->getFlashdata('sukses'); ?>
    <div class="body" style="margin-top: 10vh;">
      <div class="content-1">
        <div class="n1">
          <img class="man img-fluid" src="<?= base_url('/')?>/user/image/man.png" alt="">
        </div>
        <div class="n2">
          <img class="paper img-fluid" src="<?= base_url('/')?>/user/image/paper.png" alt="">
        </div>
        <div class="n3">
          <img class="women img-fluid" src="<?= base_url('/')?>/user/image/women.png" alt="">
        </div>
        <div class="n4">
          <h1 style="margin-top: 2rem;">PERMOHONAN PERPANJANGAN HAK GUNA BANGUNAN
              DAN HAK PAKAI
          </h1>
          <p style="font-size: 20px;">
            Lakukan perpanjangan hak guna bangunan dan hak pakai anda
            sebelum  waktunya.
          </p>
        </div>
      </div>

    <div class="bot-content">
      
      <div class="alur">
        <h3 style="color: #448EBF;">
          ALUR PROSES PERMOHONAN
          PERPANJANGAN & PEMBARUAN HGB/HP
        </h3>
          <div class="n1 content">
            <img class="img-fluid" src="<?= base_url('/')?>/user/image/alur-1.png" alt="">
          </div>
          <div class="n2 content">
            <img class="img-fluid" src="<?= base_url('/')?>/user/image/alur-2.png" alt="">
          </div>
          <div class="n3 content">
            <img class="img-fluid" src="<?= base_url('/')?>/user/image/alur-3.png" alt="" >
          </div>
      </div>

      <div class="persyaratan">
        <h3>PERSYARATAN ADMINISTRATIF</h3>

        <img class="img-fluid" src="<?= base_url('/')?>/user/image/prs-1.png" alt="">
        <img class="img-fluid" src="<?= base_url('/')?>/user/image/prs-2.png" alt="">

        <div class="button-ajukan">
          <a href="<?= base_url('form')?>"><button type="button" name="button">AJUKAN SEKARANG</button></a>
        </div>

      </div>

    </div>
  </div>

    <?= $this->endSection() ?>
