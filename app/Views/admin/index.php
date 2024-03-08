<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<head>
    <link rel="stylesheet" type="text/css" href="<?= base_url('/') ?>/admin/css/index.css">
</head>

<?= session()->getFlashdata('sukses'); ?>
<div class="" style="margin-bottom: 20vh;">
    <div class="card p-3 shadow ">
        <form action="<?= base_url('/administrator') ?>" method="get" class="d-flex justify-content-center my-3">
            <div class="text-center">
                <label for="status">Filter Status Dokumen: </label>
                <select name="status" id="status" onchange="submit()" class="form-control text-center" style="width: 200px;">
                    <option value="all" <?= $status == 'all' ? 'selected' : '' ?>>Semua</option>
                    <option value="0" <?= $status == 0 ? 'selected' : '' ?>>Belum di prosess</option>
                    <option value="1" <?= $status == 1 ? 'selected' : '' ?>>Sedang di prosess</option>
                    <option value="2" <?= $status == 2 ? 'selected' : '' ?>>Selesai</option>
                </select>
            </div>
        </form>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Permohonan</th>
                        <th>Nama Lengkap</th>
                        <th>NIK</th>
                        <th>Foto KTP</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data->getResult() as $key => $item) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td><?= $item->kdpermohonan ?></td>
                            <td><?= $item->nama ?></td>
                            <td><?= $item->nik ?></td>
                            <td>
                                <img class="img-thumbnail" src="<?= base_url('berkas/ktp') ?>/<?= $item->foto_ktp ?>" alt="">
                            </td>
                            <td style="color: green;"><?= $item->tgl_masuk ?></td>
                            <td>
                                <?= $item->status == 0 ? 'Belum diproses' : ($item->status == 1 ? 'Sedang diproses' : 'Selesai') ?>
                            </td>
                            <td>
                                <a href="<?= base_url('p3/' . $item->p3_id) ?>" class="btn-sm btn-primary"><i class="fa-solid fa-file"></i></a>
                                <a href="<?= base_url('berkas/permohonan') ?>/<?= $item->file_permohonan ?>" download="" class="btn-sm btn-light"><i class="fa-solid fa-download"></i></a></li></a>
                                <a href="<?= base_url('p3/' . $item->p3_id) ?>/edit" class="btn-sm btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="<?= base_url('p3/' . $item->p3_id) ?>/delete" class="btn-sm btn-danger delete-button" data-id="<?= $item->p3_id ?>"> <i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                const itemId = this.getAttribute('data-id');
                const confirmDelete = confirm('Yakin mau dihapus?');

                if (!confirmDelete) {
                    event.preventDefault(); // Prevent the link from executing if the user cancels
                } else {
                    // The user confirmed, proceed with the deletion.
                    window.location.href = this.href;
                }
            });
        });
    });
</script>


<?= $this->endSection('content') ?>