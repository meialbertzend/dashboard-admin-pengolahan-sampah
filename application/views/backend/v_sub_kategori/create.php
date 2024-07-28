<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-duotone fa-list mx-3"></i><?= $title; ?></h1>

    <!-- Form Tambah Subkategori -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <?= form_open('sub_kategori/create'); ?>
            <div class="form-group">
                <label for="id_kategori">Kategori :</label>
                <select name="id_kategori" class="form-control" id="id_kategori">
                    <option value="" selected disabled>- Pilih Kategori -</option>
                    <?php foreach ($kategori as $row) : ?>
                        <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_kategori', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="jenis_sampah">Nama Sub Kategori :</label>
                <input type="text" name="jenis_sampah" class="form-control" id="jenis_sampah" value="<?= set_value('jenis_sampah'); ?>">
                <?= form_error('jenis_sampah', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi :</label>
                <textarea name="deskripsi" class="form-control" id="deskripsi"><?= set_value('deskripsi'); ?></textarea>
                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="harga">Harga/Kg (Rp) :</label>
                <input type="text" name="harga" class="form-control" id="harga" value="<?= set_value('harga'); ?>">
                <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <button type="submit" name="create" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('sub_kategori') ?>" class="btn btn-danger float-right mx-2">Batal</a>
            <?= form_close(); ?>
        </div>
    </div>

</div>
<!-- End of Main Content -->