<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Ubah Data Member</h2>

            <form action="/Member/update/<?= $member['id_member']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="nama_lengkap" value="<?= $member['nama_lengkap']; ?>">
                <input type="hidden" name="pictLama" value="<?= $member['pict']; ?>">
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $member['nama'] ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?= (old('jenis_kelamin')) ? old('jenis_kelamin') : $member['jenis_kelamin'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= (old('alamat')) ? old('alamat') : $member['alamat'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= (old('email')) ? old('email') : $member['email'] ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= (old('username')) ? old('username') : $member['username'] ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="no_hp" class="col-sm-2 col-form-label">No Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= (old('no_hp')) ? old('no_hp') : $member['no_hp'] ?>">
                    </div>
                </div>
                <div class=" row mb-3">
                    <label for="pict" class="col-sm-2 col-form-label">Pict</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $member['pict']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <label for="pict" class="form-label"><?= $member['pict']; ?></label>
                            <input class="form-control" type="file" <?= ($validation->hasError('pict')) ? 'is-invalid' : ''; ?> id="pict" name="pict" onchange="previewImg()">
                        </div>
                    </div>
                </div>
                <button type=" submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>