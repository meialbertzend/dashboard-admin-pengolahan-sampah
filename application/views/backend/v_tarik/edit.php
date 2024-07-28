<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-money-bill-wave-alt mx-3"></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 col-lg-8">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Transaksi Tarik</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= site_url('transaksi_tarik/edit/' . $tarik['id_tarik']); ?>">
                <div class="form-group">
                    <label for="tgl_tarik">Tanggal Tarik :</label>
                    <input type="date" name="tgl_tarik" class="form-control" id="tgl_tarik" value="<?= set_value('tgl_tarik', $tarik['tgl_tarik']); ?>">
                    <small class="form-text text-danger"><?= form_error('tgl_tarik'); ?></small>
                </div>
                <div class="form-group">
                    <label for="id_nasabah">Nama Nasabah :</label>
                    <select name="id_nasabah" id="id_nasabah" class="form-control" onchange="updateSaldoAwal()">
                        <option value="" selected disabled>- Pilih Nasabah -</option>
                        <?php foreach ($nasabah as $n) : ?>
                            <option value="<?= $n['id_nasabah'] ?>" data-saldo="<?= $n['saldo'] ?>" <?= $n['id_nasabah'] == $tarik['id_nasabah'] ? 'selected' : ''; ?>>
                                <?= $n['nama_nasabah'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('id_nasabah'); ?></small>
                </div>
                <div class="form-group">
                    <label for="saldo_awal">Saldo Awal (Rp) :</label>
                    <input type="text" name="saldo_awal" class="form-control" id="saldo_awal" value="<?= set_value('saldo_awal', $tarik['saldo_awal']); ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('saldo_awal'); ?></small>
                </div>
                <div class="form-group">
                    <label for="jumlah_tarik">Jumlah Penarikan (Rp) :</label>
                    <input type="text" name="jumlah_tarik" class="form-control" id="jumlah_tarik" value="<?= set_value('jumlah_tarik', $tarik['jumlah_tarik']); ?>" oninput="updateSaldoAkhir()">
                    <small class="form-text text-danger"><?= form_error('jumlah_tarik'); ?></small>
                </div>
                <div class="form-group">
                    <label for="saldo_akhir">Saldo Akhir (Rp) :</label>
                    <input type="text" name="saldo_akhir" class="form-control" id="saldo_akhir" value="<?= set_value('saldo_akhir', $tarik['saldo_akhir']); ?>" readonly>
                    <small class="form-text text-danger"><?= form_error('saldo_akhir'); ?></small>
                </div>
                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                <a href="<?= site_url('transaksi_tarik') ?>" class="btn btn-danger float-right mx-2">Batal</a>
            </form>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<script>
    function updateSaldoAwal() {
        var nasabahSelect = document.getElementById("id_nasabah");
        var selectedOption = nasabahSelect.options[nasabahSelect.selectedIndex];
        var saldoAwal = selectedOption.getAttribute("data-saldo");
        document.getElementById("saldo_awal").value = saldoAwal;
        updateSaldoAkhir();
    }

    function updateSaldoAkhir() {
        var saldoAwal = parseFloat(document.getElementById("saldo_awal").value || 0);
        var jumlahTarik = parseFloat(document.getElementById("jumlah_tarik").value || 0);
        var saldoAkhir = saldoAwal - jumlahTarik;
        document.getElementById("saldo_akhir").value = saldoAkhir;
    }
</script>