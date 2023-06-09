    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('<?= base_url() ?>assets/img/sparepart1.jpg'); background-size: cover;">
                                <div class="position-absolute top-10 start-5 col-md-7 pb-2">
                                    <h1 class="text-white text-start text-underline">Efficient <span class="text-primary">Tracking</span> for Automotive <span class="text-info">Spareparts</span></h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Sign Up to SpareTrack</h4>
                                    <p class="mb-0">Enter your email and password to register</p>
                                </div>
                                <div class="card-body">
                                    <form role="form" method="post" action="<?= base_url("auth/signup") ?>">
                                        <div class="input-group input-group-outline mb-0 <?php if (form_error("name")) : echo "is-invalid"; ?> <?php endif; ?>">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control background-none" name="name">
                                        </div>
                                        <?= form_error("name", "<small class='text-danger pl-3'>", "</small>") ?>

                                        <div class="input-group input-group-outline mt-3 mb-0 <?php if (form_error("email")) : echo "is-invalid"; ?> <?php endif; ?>">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control" name="email">
                                        </div>
                                        <?= form_error("email", "<small class='text-danger pl-3'>", "</small>") ?>
                                        <div class="input-group input-group-outline mt-3 mb-0 <?php if (form_error("password1")) : echo "is-invalid"; ?> <?php endif; ?>">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password1">
                                        </div>
                                        <div class="input-group input-group-outline mt-3 mb-0 <?php if (form_error("password1")) : echo "is-invalid"; ?> <?php endif; ?>">
                                            <label class="form-label">Confirm password</label>
                                            <input type="password" class="form-control" name="password2">
                                        </div>
                                        <?= form_error("password1", "<small class='text-danger pl-3'>", "</small>") ?>
                                        <p class="mt-3 mb-0">Role</p>
                                        <div class="input-group mb-3">
                                            <select class="form-select border-0 ps-1" name="role">
                                                <option value="1">Operator</option>
                                                <option value="2">Admin</option>
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-0 mb-0">Sign Up</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Already have an account?
                                        <a href="<?= base_url("auth") ?>" class="text-primary text-gradient font-weight-bold">Sign in</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>