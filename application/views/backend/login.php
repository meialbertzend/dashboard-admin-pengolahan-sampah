<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Halaman Masuk!</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>

                                <!-- Tampilkan pesan error di sini -->
                                <?php if ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger">
                                        <?php echo $this->session->flashdata('error'); ?>
                                    </div>
                                <?php endif; ?>
                                <form method="post" action="<?php echo site_url('auth/login') ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="id_admin" placeholder="Username...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="pswd_admin" placeholder="Password">
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Masuk">

                                </form>
                                <hr>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>