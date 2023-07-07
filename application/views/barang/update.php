<main class="main-content border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">update</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">update</h6>
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

    <div class="container-fluid py-4">
        <div class="col-8">
            <form action="<?= base_url("barang/ubahreq") ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $barang["id"] ?>">
                <div class="mb-4">
                    <div class="input-group input-group-static">
                        <label>Nama barang</label>
                        <input type="text" name="nama" class="form-control" value="<?= $barang['nama'] ?>">
                    </div>
                </div>
                <div class="mb-4 row">
                    <div class="col">
                        <div class="input-group input-group-static">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control" autocomplete="off" value="<?= $barang["stok"] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-static">
                            <label>Harga</label>
                            <input type="number" name="harga" class="form-control" autocomplete="off" value="<?= $barang["harga"] ?>">
                        </div>
                    </div>
                </div>
                <div class="mb-4 row">
                    <div class="col">
                        <div class="input-group input-group-static">
                            <label for="exampleFormControlSelect1" class="ms-0">Kategori</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                <option value="OLI">OLI</option>
                                <option value="REM">REM</option>
                                <option value="BAN">BAN</option>
                                <option value="KACA">KACA</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group input-group-static">
                            <label for="exampleFormControlSelect1" class="ms-0">Merk</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="merk">
                                <option value="UNIVERSAL">UNIVERSAL</option>
                                <option value="YAMAHA">YAMAHA</option>
                                <option value="HONDA">HONDA</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="foto" class="form-label">Update foto</label>
                    <div class="img img-thumbnail ratio ratio-21x9">
                        <img src="<?= base_url() ?>assets/img/products/<?= $barang["foto"] ?>" class="rounded object-fit-cover" alt="product">
                    </div>
                    <input type="file" id="foto" name="foto" class="mt-2 form-control outline" accept="image/png, image/gif, image/jpeg">
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url("admin") ?>" class="btn">Kembali</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</main>