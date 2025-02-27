<style>
    .category-1 {
        background-color: #e6f7ff;
    }

    .category-2 {
        background-color: #f9f6ef;
    }

    .category-3 {
        background-color: #fff0f6;
    }

    .category-4 {
        background-color: #e6ffe6;
    }

    .category-5 {
        background-color: #f5f5dc;
    }

    /* Tambahkan lebih banyak kelas sesuai kebutuhan untuk kategori lainnya */
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-duotone fa-list mx-3"></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="<?= site_url('sub_kategori/create'); ?>" class="btn btn-primary mx-3">
                <i class="fas fa-plus mr-2"></i>Tambah Sub Kategori
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Sub Kategori</th>
                            <th>Deskripsi</th>
                            <th>Harga/Kg (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($subkategori as $sampah) :
                            // Tentukan kelas berdasarkan kategori
                            $category_class = '';
                            switch ($sampah['id_kategori']) {
                                case 1:
                                    $category_class = 'category-1';
                                    break;
                                case 2:
                                    $category_class = 'category-2';
                                    break;
                                case 3:
                                    $category_class = 'category-3';
                                    break;
                                case 4:
                                    $category_class = 'category-4';
                                    break;
                                case 5:
                                    $category_class = 'category-5';
                                    break;
                                    // Tambahkan lebih banyak case sesuai kebutuhan untuk kategori lainnya
                                default:
                                    $category_class = 'default-category';
                                    break;
                            }
                        ?>
                            <tr class="<?= $category_class; ?>">
                                <td><?= $no++; ?></td>
                                <td><?= $sampah['nama_kategori']; ?></td>
                                <td><?= $sampah['jenis_sampah']; ?></td>
                                <td><?= $sampah['deskripsi']; ?></td>
                                <td><?= "Rp. " . number_format($sampah['harga'], 2, ",", ".") ?></td>
                                <td>
                                    <a class="btn btn-success" href="<?= site_url('sub_kategori/edit/' . $sampah['id_subkategori']); ?>"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Yakin ingin hapus?');" href="<?= site_url('sub_kategori/delete/' . $sampah['id_subkategori']); ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->