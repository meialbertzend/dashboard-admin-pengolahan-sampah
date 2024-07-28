<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-money-bill-wave-alt mx-3"></i></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <a href="<?= site_url('transaksi_tarik/create') ?>" class="btn btn-primary mx-3">
                <i class="fas fa-plus mr-2"></i>Tambah Transaksi Tarik
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data <strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Tarik</th>
                            <th>Nama Nasabah</th>
                            <th>Saldo Awal</th>
                            <th>Jumlah Penarikan</th>
                            <th>Saldo Akhir</th>
                            <th>Admin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($transaksi_tarik as $t) : ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $t['tgl_tarik'] ?></td>
                                <td><?= $t['nama_nasabah'] ?></td>
                                <td><?= "Rp. " . number_format($t['saldo_awal'], 2, ",", ".") ?></td>
                                <td><?= "Rp. " . number_format($t['jumlah_tarik'], 2, ",", ".") ?></td>
                                <td><?= "Rp. " . number_format($t['saldo_akhir'], 2, ",", ".") ?></td>
                                <td><?= $t['nama_admin'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= site_url('transaksi_tarik/edit/') . $t['id_tarik'] ?>"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" href="<?= site_url('transaksi_tarik/delete/') . $t['id_tarik'] ?>" onclick="return confirm('Yakin Ingin Hapus?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->