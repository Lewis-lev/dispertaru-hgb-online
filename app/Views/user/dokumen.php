<?= $this->extend('user/layout') ?>

<?= $this->section('content') ?>

    <div class="card p-3 shadow">
        <form action="<?= base_url('cek-dokumen')?>" method="get" class="my-2 row text-center justify-content-center">
            <label for="status">Filter Status Dokumen: </label>
            <select name="status" id="status" onchange="submit()" class="form-control text-center" style="width: 200px;">
                        <option value="all" <?= $status == 'all' ? 'selected' : '' ?>>Semua</option>
                        <option value="0" <?= $status == 0 ? 'selected' : '' ?>>Belum di prosess</option>
                        <option value="1" <?= $status == 1 ? 'selected' : '' ?>>Sedang di prosess</option>
                        <option value="2" <?= $status == 2 ? 'selected' : '' ?>>Selesai</option>
                    </select>
        </form>
        <div class="table-responsive">
            <table id="myTable" class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Permohonan</th>
                        <th>Whatsapp Dispertaru</th>
                        <th>Email Dispertaru</th>
                        <th>Tanggal Update</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; 
                    foreach ($data as $item): ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $item['kdpermohonan'] ?></td>
                                <td><a href="https://wa.me/<?= $item['no_hp'] ?>" target="_blank"><?= $item['no_hp'] ?></a></td>
                                <td><a href="mailto:<?= $item['emailadmin'] ?>" target="_blank"><?= $item['emailadmin'] ?></a></td>
                                <td style="color: green;"><?= $item['tgl_update'] ?></td>
                                <td style="background-color:aquamarine">
                                    <?= $item['status'] == 0 ? 'Belum diproses' : ($item['status'] == 1 ? 'Sedang diproses' : 'Selesai') ?>
                                </td>
                            </tr>
                      
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <?= $this->endSection() ?>
