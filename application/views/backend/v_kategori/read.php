<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-layer-group mx-3"></i></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->

            <a href="kategori/create" class="btn btn-primary mx-3">
                <i class="fas fa-plus mr-2"></i>Tambah Kategori
            </a>

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
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($kategori as $k) :  ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?= $k['nama_kategori'] ?></td>
                                    <td><?= $k['deskripsi'] ?></td>
                                    <td class="my-5">
                                        <a class="btn btn-success" href="<?php echo site_url('kategori/edit/') ?><?= $k['id_kategori']; ?>"><i class="fas fa-edit"></i></a>
                                        <a type="button" class="btn btn-danger" onclick="return confirm('Yakin Ingin hapus?');" href="<?php echo site_url('kategori/delete/') ?><?= $k['id_kategori'] ?>"><i class="fas fa-trash"></i></a>
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
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->