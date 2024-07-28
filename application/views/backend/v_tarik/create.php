<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-money-bill-wave-alt mx-3"></i><?= $title; ?></h1>

    <!-- Form Tambah Transaksi Tarik -->
    <div class="card shadow mb-4">
        <div class="card-body">

            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?= form_open('transaksi_tarik/create'); ?>
            <div class="form-group">
                <label for="tgl_tarik">Tanggal Tarik :</label>
                <input type="date" class="form-control" id="tgl_tarik" name="tgl_tarik" required>
            </div>
            <div class="form-group">
                <label for="id_nasabah">Nama Nasabah :</label>
                <select name="id_nasabah" id="id_nasabah" class="form-control" onchange="updateSaldoAwal()">
                    <option value="" selected disabled>- Pilih Nasabah -</option>
                    <?php foreach ($nasabah as $n) : ?>
                        <option value="<?= $n['id_nasabah'] ?>" data-saldo="<?= $n['saldo'] ?>"><?= $n['nama_nasabah'] ?></option>
                    <?php endforeach; ?>
                </select>
                <?= form_error('id_nasabah', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="saldo_awal">Saldo Awal (Rp) :</label>
                <input type="text" name="saldo_awal" class="form-control" id="saldo_awal" readonly>
            </div>
            <div class="form-group">
                <label for="jumlah_tarik">Jumlah Penarikan (Rp) :</label>
                <input type="text" name="jumlah_tarik" class="form-control" id="jumlah_tarik" value="<?= set_value('jumlah_tarik'); ?>" oninput="updateSaldoAkhir()">
                <?= form_error('jumlah_tarik', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="saldo_akhir">Saldo Akhir (Rp) :</label>
                <input type="text" name="saldo_akhir" class="form-control" id="saldo_akhir" readonly>
            </div>
            <input type="hidden" name="id_admin" value="<?= $this->session->userdata('id_admin'); ?>">
            <button type="submit" name="create" class="btn btn-primary float-right">Simpan</button>
            <a href="<?= site_url('transaksi_tarik') ?>" class="btn btn-danger float-right mx-2">Batal</a>
            <?= form_close(); ?>
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