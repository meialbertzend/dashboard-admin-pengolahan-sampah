<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-users mx-3"></i></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-lg-6">

        <form method="post" class="mx-5 my-3">
            <div class="form-group">
                <label for="id_nasabah">ID Nasabah :</label>
                <input type="text" name="id_nasabah" class="form-control" id="id_nasabah" value="<?= isset($id_nasabah) ? $id_nasabah : ''; ?>">
                <small class="form-text text-danger"><?= form_error('id_nasabah'); ?></small>
            </div>
            <div class="form-group">
                <label for="nama_nasabah">Nama Lengkap :</label>
                <input type="text" name="nama_nasabah" class="form-control" id="nama_nasabah" value="<?= isset($nama_nasabah) ? $nama_nasabah : ''; ?>">
                <small class="form-text text-danger"><?= form_error('nama_nasabah'); ?></small>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP :</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= isset($no_hp) ? $no_hp : ''; ?>">
                <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= isset($alamat) ? $alamat : ''; ?>">
                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
            <button type="submit" name="create" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('nasabah') ?>" class="btn btn-danger float-right mx-2">Batal</a>
        </form>

    </div>
</div>
<!-- End of Main Content -->