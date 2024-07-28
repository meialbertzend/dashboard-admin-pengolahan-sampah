<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 my-3 text-gray-800"><i class="fas fa-fw fa-duotone fa-user-lock mx-3"></i><?= $title; ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- Button trigger modal -->
            <a href="admin/create" class="btn btn-primary mx-3">
                <i class="fas fa-plus mr-2"></i>Tambah Admin
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data<strong> berhasil</strong>
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
                            <th>ID Admin</th>
                            <th>Nama</th>
                            <th>Password</th>
                            <th>Level Admin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($admin as $row) : ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?= $row['id_admin'] ?></td>
                                <td><?= $row['nama_admin'] ?></td>
                                <td><?= $row['pswd_admin'] ?></td>
                                <td><?= $row['level'] ?></td>

                                <td class="my-5">
                                    <a class="btn btn-success" href="<?= site_url('admin/edit/') . $row['id_admin'] ?>"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger" onclick="return confirm('Yakin Ingin hapus?');" href="<?= site_url('admin/delete/') . $row['id_admin'] ?>"><i class="fas fa-trash"></i></a>
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