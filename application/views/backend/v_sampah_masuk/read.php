<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-hand-holding-usd mx-3"></i></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <a href="<?= site_url('sampah_masuk/create'); ?>" class="btn btn-primary mx-3">
                <i class="fas fa-plus mr-2"></i>Tambah Data Transaksi Setor
            </a>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert"> Data
                        <strong> berhasil</strong>
                        <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Admin</th>
                            <th>Nasabah</th>
                            <th>Kategori</th>
                            <th>Nama Sub Kategori</th>
                            <th>Tanggal Pengumpulan</th>
                            <th>Berat (Kg)</th>
                            <th>Harga (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($sampah_masuk as $row) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama_admin']; ?></td>
                                <td><?= $row['nama_nasabah']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td><?= $row['jenis_sampah']; ?></td>
                                <td><?= $row['tgl_pengumpulan']; ?></td>
                                <td><?= number_format($row['berat'], 2, ",", ".") . " Kg"; ?></td>
                                <td><?= "Rp " . number_format($row['harga'], 2, ",", "."); ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= site_url('sampah_masuk/edit/' . $row['id_sampah_masuk']); ?>"><i class="fas fa-edit"></i></a>
                                    <a type="button" class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?');" href="<?= site_url('sampah_masuk/delete/' . $row['id_sampah_masuk']); ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->