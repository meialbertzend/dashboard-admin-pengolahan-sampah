<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800">
        <i class="fas fa-fw fa-solid fa-chart-bar mx-3"></i><?= $title; ?>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-lg-6">
        <form method="post" class="mx-5 my-3">

            <div class="form-group">
                <label for="nama_nasabah">Nasabah :</label>
                <select name="id_nasabah" class="form-control" id="nama_nasabah" required>
                    <option value="" selected disabled>-Pilih Nasabah-</option>
                    <?php foreach ($nasabah as $row) : ?>
                        <option value="<?= $row['id_nasabah']; ?>" <?php if ($row['id_nasabah'] == $sampah_masuk['id_nasabah']) echo 'selected'; ?>><?= $row['nama_nasabah']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('id_nasabah'); ?></small>
            </div>

            <div class="form-group">
                <label for="nama_kategori">Kategori :</label>
                <select name="id_kategori" class="form-control" id="nama_kategori" required>
                    <option value="" selected disabled>-Pilih Kategori-</option>
                    <?php foreach ($kategori_sampah as $row) : ?>
                        <option value="<?= $row['id_kategori']; ?>" <?php if ($row['id_kategori'] == $sampah_masuk['id_kategori']) echo 'selected'; ?>><?= $row['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('id_kategori'); ?></small>
            </div>

            <div class="form-group">
                <label for="tgl_pengumpulan">Tanggal Pengumpulan :</label>
                <input type="date" name="tgl_pengumpulan" class="form-control" id="tgl_pengumpulan" value="<?= $sampah_masuk['tgl_pengumpulan']; ?>" required>
                <small class="form-text text-danger"><?= form_error('tgl_pengumpulan'); ?></small>
            </div>

            <div class="form-group">
                <label for="berat">Berat (kg) :</label>
                <input type="text" name="berat" class="form-control" id="berat" value="<?= $sampah_masuk['berat']; ?>" required>
                <small class="form-text text-danger"><?= form_error('berat'); ?></small>
            </div>

            <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('sampah_masuk') ?>" class="btn btn-danger float-right mx-2">Batal</a>
        </form>
    </div>

</div>
<!-- End of Main Content -->