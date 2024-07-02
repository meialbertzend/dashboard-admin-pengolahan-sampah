<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-user-lock mx-3"></i><?= $title; ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-lg-6">
        <form method="post" class="mx-5 my-3">
            <div class="form-group">
                <label for="IDAdmin">Username :</label>
                <input type="text" name="id_admin" class="form-control" id="id_admin" value="<?= set_value('id_admin', $admin['id_admin']); ?>">
                <small class="form-text text-danger"><?= form_error('id_admin'); ?></small>
            </div>
            <div class="form-group">
                <label for="NamaAdmin">Nama Lengkap :</label>
                <input type="text" name="nama_admin" class="form-control" id="nama_admin" value="<?= set_value('nama_admin', $admin['nama_admin']); ?>">
                <small class="form-text text-danger"><?= form_error('nama_admin'); ?></small>
            </div>
            <div class="form-group">
                <label for="PassAdmin">Password :</label>
                <input type="password" name="pswd_admin" class="form-control" id="pswd_admin" value="<?= set_value('pswd_admin', $admin['pswd_admin']); ?>">
                <small class="form-text text-danger"><?= form_error('pswd_admin'); ?></small>
            </div>
            <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('admin') ?>" class="btn btn-danger float-right mx-2">Batal</a>
        </form>
    </div>
</div>