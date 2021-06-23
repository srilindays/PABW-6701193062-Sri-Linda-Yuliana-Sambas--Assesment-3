<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>



<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Member</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/img/<?= $member['pict']; ?>" alt="..." class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $member['nama_lengkap']; ?></h5>
                            <p class="card-text">Jenis Kelamin : <?= $member['jenis_kelamin']; ?></p>
                            <p class="card-text">Alamat : <?= $member['alamat']; ?></p>
                            <p class="card-text">No Handphone : <?= $member['no_hp']; ?></p>
                            <p class="card-text">Email : <?= $member['email']; ?></p>
                            <p class="card-text"><small class="text-muted">Username : <?= $member['username']; ?></small></p>

                            <a href="/member/edit/<?= $member['nama_lengkap']; ?>" class="btn btn-warning">Edit</a>

                            <form action="/member/<?= $member['id_member']; ?>" method="POST" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="delete">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Delete</button>
                            </form>
                            <br>
                            <a href="/member">Kemblalil ke daftar member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>