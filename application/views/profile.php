<main class="main-content border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">profile</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">profile</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                </div>
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-xl-none d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item dropdown ps-3 pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none"><?= $user["name"] ?></span>

                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <div class="d-flex py-1 justify-content-center">
                                    <a class="nav-link text-dark " href="<?= base_url("auth/logout") ?>">
                                        <div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
                                            <i class="material-icons opacity-10">logout</i>
                                            <span class="nav-link-text ms-1">Log out</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-8 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="<?= base_url() ?>assets/img/profiles/<?= $user["image"]  ?>" alt="profile_image" class="w-100 h-100 border-radius-lg shadow-sm object-fit-cover">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $user["name"] ?>
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            <?= $user["role_id"] == 1 ? "Operator" : "Admin" ?>
                        </p>
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <?= $user["email"] ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col d-flex justify-content-end align-items-center">
                    <button type="button" class="btn btn-primary m-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Update
                    </button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Profile</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url("") ?>profile/update" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?= $user["id"] ?>">
                                        <div class="mb-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" placeholder="<?= $user["name"] ?>">
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="input-group input-group-static mb-4">
                                                <label>Email</label>
                                                <input type="text" name="email" class="form-control" placeholder="<?= $user["email"] ?>">
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="foto" class="form-label">Upload foto</label>
                                            <div class="row">
                                                <div>
                                                    <div class="avatar avatar-xl position-relative">
                                                        <img src="<?= base_url() ?>assets/img/profiles/<?= $user["image"]  ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                                                    </div>
                                                </div>
                                                <div>
                                                    <input type="file" id="foto" name="foto" class="form-control outline" accept="image/png, image/gif, image/jpeg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>