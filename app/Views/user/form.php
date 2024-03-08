<?= $this->extend('user/layout') ?>

<?= $this->section('content') ?>
<?= session()->getFlashdata('error'); ?>

<head>
    <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
</head>

<form id="form" class="container" action="<?= base_url('simpan') ?>" method="post" enctype="multipart/form-data" style="margin-top: 10vh;">
  <?= csrf_field(); ?>
  <div class="form-input" id="form1">
    <div class="form text-center row pb-5">
      <div class="col-12 text-center">
        <h2>Lengkapi data berikut</h2>
      </div>
      <input style="display: none;" type="text" id="kode" name="kdpermohonan" value="P<?php
                                                                                      helper('text');
                                                                                      $code = random_string('numeric', 10);
                                                                                      echo $code; ?>
                    ">
      <div class="col-12 col-md-6">
        <label for="name">Nama lengkap (Sesuai KTP)</label>
        <input type="text" name="nama" id="nama" value="" >
      </div>
      <div class="col-12 col-md-6">
        <label for="alamat">Alamat Lolasi</label>
        <input type="text" name="alamat" id="alamat" value="" >
      </div>
      <div class="col-12 col-md-6">
        <label for="ttl">Tempat lahir (Sesuai KTP)</label>
        <input type="text" name="tempat_lahir" id="tempat_lahir" value="" >
      </div>
      <div class="col-12 col-md-6">
        <label for="ttl">Tanggal lahir (Sesuai KTP)</label>
        <input type="date" name="tanggal_lahir" id="tgl_lahir" value="" >
      </div>
      <div class="col-12 col-md-6">
        <label for="hp">No handphone</label>
        <input type="text" name="no_hp" value="" id="no_hp" >
      </div>
      <div class="col-12 col-md-6">
        <label for="email">Email</label>
        <input type="text" name="email" value="" id="email" >
      </div>
      <div class="col-12 col-md-6">
        <label for="pekerjaan">Pekerjaan</label>
        <input type="text" id="pekerjaan" name="pekerjaan" value="" >
      </div>
      <div class="col-12 col-md-6">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="nik" value="" >
      </div>
      <div class="col-12 col-md-6">
        <label for="ktp">Upload foto KTP anda (Bentuk gambar)</label>
        <input type="file" name="ktp" id="ktp" value="">
      </div>
      <div class="col-12 col-md-6">
        <label for="detail">Upload detail permohonan anda (Bentuk PDF)</label>
        <input type="file" name="file_permohonan" id="pdffile" value="">
      </div> <br>
    </div>
    <b>Setelah submit data, anda akan menerima file, mohon untuk disimpan</b>
    <div class="btn-box">
      <!-- <button type="button" id="next1" name="button"><i class="fa-solid fa-right-long arrow"></i></button> -->
    </div>
  </div>

  <div class="row justify-content-center">
    <button type="submit" class="mt-5" style="width: 200px;">SUBMIT</button>
  </div>
</form>
<script src="<?= base_url('/') ?>/admin/js/jspdf.js"></script>
<?= $this->endSection() ?>