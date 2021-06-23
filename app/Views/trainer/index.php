<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Data Trainer</h1>
            <form action=" " method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukan keyword pencarian..." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Jenis kelamin</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (8 * ($currentPage - 1)); ?>
                    <?php foreach ($trainer as $t) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $t['nama'] ?></td>
                            <td><?= $t['alamat']; ?></td>
                            <td><?= $t['jenis_kelamin']; ?></td>
                            <td>
                                <a href="" class="btn btn-success">Datail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <a href="/Member/create" class="btn btn-primary mt-3">Tambah Data Trainer</a>
            <?= $pager->links('trainer', 'trainer_pagination'); ?>

        </div>
    </div>
</div>

<?= $this->endSection(); ?>