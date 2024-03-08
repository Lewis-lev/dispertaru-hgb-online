<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<head>
<link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/admin/css/detail.css">
</head>

    <div class="container" style="margin-top: 10vh;">
    <a href="<?= base_url('/administrator')?>" class="btn btn-primary btn-kembali"><i class="fa-solid fa-backward"></i> Kembali</a>
        <div class="row">
            <div class="col-2 my-3">
            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success" style="font-size: 16px; text-align:center; background-color:aquamarine; width: 150%;">
                <strong>Status berhasil diupdate</strong>
                </div>
            <?php endif; ?>
        </div>
            <div class="col-12">
                <h4>Status:</h4>
                <ul class="list-group">
                    <li class="list-group-item"><b class="text-<?= $data->status==0?'warning':($data->status==1?'primary':'success') ?>"><?= $data->status==0?'Belum diproses':($data->status==1?'Sedang diproses':'Selesai') ?></b></li>
                </ul>
                <?php if ( $data->status!=2 ) : ?>
                    <form action="<?= base_url('update-p3/status')?>" method="post" class="mt-2">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                        <button onclick="return confirm('are you sure?')" class="btn btn-<?= $data->status==0?'primary':($data->status==1?'success':'warning') ?>" type="submit" name="status" value="<?= $data->status + 1; ?>"><?= $data->status==0?'Tandai sedang di proses':($data->status==1?'Tandai Selesai':'Selesai') ?></button>
                    </form>
                <?php endif; ?>
            </div>
            
            <div class="" style="display: flex;">
                <div class="col-md-6 col-12 mt-3">
                    <h4>Pemohon:</h4>
                    
                    <div class="list-container card">
                        <table class="pm-table">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><b><?= $data->nama ?></b></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><b><?= $data->email ?></b></td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>:</td>
                                <td><b><?= $data->tempat_lahir ?></b></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>
                                <td><b><?= date('d-m-Y',strtotime($data->tanggal_lahir)) ?></b></td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td><b><?= $data->no_hp ?></b></td>
                            </tr>
                            <tr>
                                <td>Alamat Lokasi</td>
                                <td>:</td>
                                <td><b><?= $data->alamat ?></b></td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>:</td>
                                <td><b><?= $data->pekerjaan ?></b></td>
                            </tr>
                            <tr>
                                <td>Unduh Dokumen</td>
                                <td>:</td>
                                <td> <a href="<?= base_url('berkas/permohonan') ?>/<?= $data->file_permohonan ?>" download="" class="btn btn-light"><i class="fa-solid fa-download"></i></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-2 mt-2">
                    <a href="<?= base_url('berkas/ktp') ?>/<?= $data->foto_ktp ?>" target="_black"><img src="<?= base_url('berkas/ktp') ?>/<?= $data->foto_ktp ?>" class="img-thumbnail"></a>
                </div>
            </div>
     
        </div>
    </div>

    <iframe
                    src="<?= base_url('berkas/permohonan/'.$data->file_permohonan) ?>"
                    height="1000vh"
                    width="80%"
                ></iframe>


    <?= $this->endSection('content') ?>

