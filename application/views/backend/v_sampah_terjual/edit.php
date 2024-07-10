<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800">
        <i class="fas fa-fw fa-shopping-cart mx-3"></i><?= $title; ?>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-lg-6">
        <form method="post" class="mx-5 my-3">

            <div class="form-group">
                <label for="nama_kategori">Kategori :</label>
                <select name="id_kategori" class="form-control" id="nama_kategori" required>
                    <option value="" selected disabled>-Pilih Kategori-</option>
                    <?php foreach ($kategori_sampah as $row) : ?>
                        <option value="<?= $row['id_kategori']; ?>" <?php if ($row['id_kategori'] == $sampah_terjual['id_kategori']) echo 'selected'; ?>><?= $row['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('id_kategori'); ?></small>
            </div>

            <div class="form-group">
                <label for="tgl_terjual">Tanggal Terjual :</label>
                <input type="date" name="tgl_terjual" class="form-control" id="tgl_terjual" value="<?= $sampah_terjual['tgl_terjual']; ?>" required>
                <small class="form-text text-danger"><?= form_error('tgl_terjual'); ?></small>
            </div>

            <div class="form-group">
                <label for="berat">Berat (kg) :</label>
                <input type="number" name="berat" class="form-control" id="berat" value="<?= $sampah_terjual['berat']; ?>" required>
                <small class="form-text text-danger"><?= form_error('berat'); ?></small>
            </div>

            <div class="form-group">
                <label for="harga">Harga (Rp) :</label>
                <input type="number" name="harga" class="form-control" id="harga" value="<?= $sampah_terjual['harga']; ?>" required>
                <small class="form-text text-danger"><?= form_error('harga'); ?></small>
            </div>

            <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('sampah_terjual') ?>" class="btn btn-danger float-right mx-2">Batal</a>
        </form>
    </div>

</div>
<!-- End of Main Content -->