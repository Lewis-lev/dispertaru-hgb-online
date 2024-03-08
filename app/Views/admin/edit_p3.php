<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<head>
  <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/user/css/form-lakwas.css">
</head>

<a style="display: block; margin: auto;" href="<?= base_url('/administrator')?>" class="btn btn-primary btn-kembali"><i class="fa-solid fa-backward"></i> Kembali</a>
      <form style="margin-top: 10vh;" id="form" class="container" action="<?= base_url('p3-update')?>" method="post" enctype="multipart/form-data">
      <?= csrf_field(); ?>
        <input type="hidden" name="pemohon_id" value="<?= $data->pemohon_id?>">
        <input type="hidden" name="form_p3_id" value="<?= $data->form_p3_id?>">
        <div class="form-input" id="form1">
          <div class="form text-center row pb-5">
            <div class="col-12 text-center">
              <h2>Edit Data</h2>
            </div>
            <div class="col-12 col-md-6">
              <label for="name">Nama lengkap</label>
              <input type="text"  name="nama" value="<?= $data->nama?>" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="alamat">Alamat</label>
              <input type="text"  name="alamat" value="<?= $data->alamat?>" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="ttl">Tempat lahir</label>
              <input type="text"  name="tempat_lahir" value="<?= $data->tempat_lahir?>" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="ttl">Tanggal lahir</label>
              <input type="date"  name="tanggal_lahir" value="<?= $data->tanggal_lahir?>" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="hp">No handphone</label>
              <input type="text"  name="no_hp" value="<?= $data->no_hp?>" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="email">Email</label>
              <input type="text"  name="email" value="<?= $data->email?>" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="pekerjaan">Pekerjaan</label>
              <input type="text"  id="usaha" name="pekerjaan" value="<?= $data->pekerjaan?>" required>
            </div>
            <div class="col-12 col-md-6">
              <label for="nik">NIK</label>
              <input type="text"  name="nik" value="<?= $data->nik?>" required>
            </div>
          </div>
          <div class="btn-box">
            <!-- <button type="button" id="next1" name="button"><i class="fa-solid fa-right-long arrow"></i></button> -->
          </div>
        </div>

        <div class="row justify-content-center">
          <button type="submit" class="mt-5" style="width: 200px;">UPDATE DATA</button>
        </div>
      </form>
    <?= $this->endSection() ?>
