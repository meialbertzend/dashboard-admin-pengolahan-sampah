<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800">
        <i class="fas fa-fw fa-hand-holding-usd mx-3"></i><?= $title; ?>
    </h1>

    <!-- Edit Form -->
    <div class="card shadow mb-4 col-lg-6">
        <form method="post" class="mx-5 my-3">
            <div class="form-group">
                <label for="nama_nasabah">Nasabah :</label>
                <select name="id_nasabah" class="form-control" id="nama_nasabah" required>
                    <option value="" selected disabled>-Pilih Nasabah-</option>
                    <?php foreach ($nasabah as $row) : ?>
                        <option value="<?= $row['id_nasabah']; ?>" <?= $row['id_nasabah'] == $sampah_masuk['id_nasabah'] ? 'selected' : ''; ?>><?= $row['nama_nasabah']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('id_nasabah'); ?></small>
            </div>

            <div class="form-group">
                <label for="nama_kategori">Kategori :</label>
                <select name="id_kategori" class="form-control" id="nama_kategori" required>
                    <option value="" selected disabled>-Pilih Kategori-</option>
                    <?php foreach ($kategori_sampah as $row) : ?>
                        <option value="<?= $row['id_kategori']; ?>" <?= $row['id_kategori'] == $sampah_masuk['id_kategori'] ? 'selected' : ''; ?>><?= $row['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('id_kategori'); ?></small>
            </div>

            <div class="form-group">
                <label for="subkategori">Nama Sub Kategori :</label>
                <select name="id_subkategori" class="form-control" id="subkategori" required>
                    <option value="" selected disabled>-Pilih Sub Kategori-</option>
                    <?php foreach ($subkategori_sampah as $row) : ?>
                        <option value="<?= $row['id_subkategori']; ?>" data-harga="<?= $row['harga']; ?>" <?= $row['id_subkategori'] == $sampah_masuk['id_subkategori'] ? 'selected' : ''; ?>><?= $row['jenis_sampah']; ?></option>
                    <?php endforeach; ?>
                </select>
                <small class="form-text text-danger"><?= form_error('id_subkategori'); ?></small>
            </div>

            <div class="form-group">
                <label for="tgl_pengumpulan">Tanggal Pengumpulan :</label>
                <input type="date" name="tgl_pengumpulan" class="form-control" id="tgl_pengumpulan" value="<?= $sampah_masuk['tgl_pengumpulan']; ?>" required>
                <small class="form-text text-danger"><?= form_error('tgl_pengumpulan'); ?></small>
            </div>

            <div class="form-group">
                <label for="berat">Berat (Kg) :</label>
                <input type="number" step="0.01" name="berat" class="form-control" id="berat" value="<?= $sampah_masuk['berat']; ?>" required>
                <small class="form-text text-danger"><?= form_error('berat'); ?></small>
            </div>

            <div class="form-group">
                <label for="harga">Harga Total :</label>
                <input type="text" name="harga" class="form-control" id="harga" value="<?= number_format($sampah_masuk['harga'], 2, ",", "."); ?>" readonly>
                <small class="form-text text-danger"><?= form_error('harga'); ?></small>
            </div>

            <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('sampah_masuk') ?>" class="btn btn-danger float-right mx-2">Batal</a>
        </form>
    </div>

</div>
<!-- End of Main Content -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const kategoriSelect = document.getElementById('nama_kategori');
        const subkategoriSelect = document.getElementById('subkategori');
        const beratInput = document.getElementById('berat');
        const hargaInput = document.getElementById('harga');

        function calculateHarga() {
            const berat = parseFloat(beratInput.value) || 0;
            const hargaPerKg = parseFloat(subkategoriSelect.options[subkategoriSelect.selectedIndex]?.getAttribute('data-harga')) || 0;
            const totalHarga = berat * hargaPerKg;
            hargaInput.value = `Rp ${totalHarga.toFixed(2).replace('.', ',')}`;
        }

        kategoriSelect.addEventListener('change', function() {
            const id_kategori = kategoriSelect.value;

            if (id_kategori) {
                fetch(`<?= site_url('sampah_masuk/get_subkategori_by_kategori/') ?>${id_kategori}`)
                    .then(response => response.json())
                    .then(data => {
                        subkategoriSelect.innerHTML = '<option value="" selected disabled>-Pilih Sub Kategori-</option>';
                        data.forEach(subkategori => {
                            subkategoriSelect.innerHTML += `<option value="${subkategori.id_subkategori}" data-harga="${subkategori.harga}">${subkategori.jenis_sampah}</option>`;
                        });
                        // Reset harga input ketika kategori berubah
                        hargaInput.value = '';
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Terjadi kesalahan saat memuat data subkategori.');
                    });
            } else {
                subkategoriSelect.innerHTML = '<option value="" selected disabled>-Pilih Sub Kategori-</option>';
                hargaInput.value = '';
            }
        });

        subkategoriSelect.addEventListener('change', calculateHarga);
        beratInput.addEventListener('input', calculateHarga);

        // Set initial subkategori and harga on page load
        const initialSubkategori = subkategoriSelect.querySelector(`option[value="${<?= json_encode($sampah_masuk['id_subkategori']); ?>}"]`);
        if (initialSubkategori) {
            subkategoriSelect.value = initialSubkategori.value;
            calculateHarga();
        }
    });
</script>