<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-layer-group mx-3"></i></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-lg-6">

        <form method="post" class="mx-5 my-3">
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori :</label>
                <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="<?= isset($kategori['nama_kategori']) ? $kategori['nama_kategori'] : ''; ?>">
                <small class="form-text text-danger"><?= form_error('nama_kategori'); ?></small>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi"><?= isset($kategori['deskripsi']) ? $kategori['deskripsi'] : ''; ?></textarea>
                <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
            </div>
            <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('kategori') ?>" class="btn btn-danger float-right mx-2">Batal</a>
        </form>

    </div>
</div>
<!-- End of Main Content -->