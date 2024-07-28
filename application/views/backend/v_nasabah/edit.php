<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-users mx-3"></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-lg-6">

        <form method="post" action="<?= site_url('nasabah/edit/' . $nasabah['id_nasabah']); ?>" class="mx-5 my-3">
            <div class="form-group">
                <label for="id_nasabah">ID Nasabah :</label>
                <input type="text" name="id_nasabah" class="form-control" id="id_nasabah" value="<?= isset($nasabah['id_nasabah']) ? $nasabah['id_nasabah'] : ''; ?>">
                <small class="form-text text-danger"><?= form_error('id_nasabah'); ?></small>
            </div>
            <div class="form-group">
                <label for="nama_nasabah">Nama Lengkap :</label>
                <input type="text" name="nama_nasabah" class="form-control" id="nama_nasabah" value="<?= isset($nasabah['nama_nasabah']) ? $nasabah['nama_nasabah'] : ''; ?>">
                <small class="form-text text-danger"><?= form_error('nama_nasabah'); ?></small>
            </div>
            <div class="form-group">
                <label for="saldo">Saldo (Rp) :</label>
                <input type="text" name="saldo" class="form-control" id="saldo" value="<?= isset($nasabah['saldo']) ? $nasabah['saldo'] : ''; ?>" readonly>
                <small class="form-text text-danger"><?= form_error('saldo'); ?></small>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP :</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?= isset($nasabah['no_hp']) ? $nasabah['no_hp'] : ''; ?>">
                <small class="form-text text-danger"><?= form_error('no_hp'); ?></small>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat :</label>
                <input type="text" name="alamat" class="form-control" id="alamat" value="<?= isset($nasabah['alamat']) ? $nasabah['alamat'] : ''; ?>">
                <small class="form-text text-danger"><?= form_error('alamat'); ?></small>
            </div>
            <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('nasabah') ?>" class="btn btn-danger float-right mx-2">Batal</a>
        </form>

    </div>
</div>
<!-- End of Main Content -->