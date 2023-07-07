<main class="main-content border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">dashboard</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">dashboard</h6>
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
        <div class="row gap-1">
            <div class="col-md-8">
                <div class="input-group input-group-outline">
                    <label class="form-label">Live search...</label>
                    <input type="search" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)" id="searchbox" oninput="setTimeout(function(){liveSearch();},500);">
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="w-100 btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah barang
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah barang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="barang/tambah" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_admin" value="<?= $user["id"] ?>">
                                    <div class="mb-4">
                                        <div class="input-group input-group-outline">
                                            <label class="form-label">Nama barang</label>
                                            <input type="text" name="nama" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                                        </div>
                                    </div>
                                    <div class="mb-4 row">
                                        <div class="col">
                                            <div class="input-group input-group-outline">
                                                <label class="form-label">Stok</label>
                                                <input type="number" name="stok" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group input-group-outline">
                                                <label class="form-label">Harga</label>
                                                <input type="number" name="harga" class="form-control" onfocus="focused(this)" onfocusout="defocused(this)">
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
                                        <label for="foto" class="form-label">Upload foto</label>
                                        <input type="file" id="foto" name="foto" class="form-control outline" accept="image/png, image/gif, image/jpeg">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama barang</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($barang as $b) : ?>
                                        <tr id="data_list">
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="<?= base_url() ?>/assets/img/products/<?= $b["foto"] ?> " class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm"><?= $b["nama"] ?></h6>
                                                        <p class="text-xs text-secondary mb-0"><?= $b["merk"] ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0"><?= $b["kategori"] ?></p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success"><?= $b["stok"] ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">Rp<?= $b["harga"] ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold"><?= date("Y-m-d", $b["added_at"]) ?></span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="<?= base_url("/barang/ubah/" . $b['id']) ?>" class="text-dark font-weight-bold text-xl" data-toggle="tooltip" data-original-title="Edit barang">
                                                    <i class="material-icons text-lg me-2">edit</i>
                                                </a>
                                                <a href="<?= base_url("/barang/detail/" . $b['id']) ?>" class="text-info font-weight-bold text-xl" data-toggle="tooltip" data-original-title="Detail barang">
                                                    <i class="material-icons text-lg me-2">info</i>
                                                </a>
                                                <a href="<?= base_url("/barang/hapus/" . $b['id']) ?>" class="text-danger font-weight-bold text-xl" data-toggle="tooltip" data-original-title="Hapus barang" onclick="return confirm('Yakin??')">
                                                    <i class="material-icons text-lg me-2">delete</i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer py-4  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <?= date("Y") ?>
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Team 5</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</main>
<script>
    function liveSearch() {
        let dataList = document.querySelectorAll("#data_list");
        let searchQuery = document.getElementById("searchbox").value;
        for (let i = 0; i < dataList.length; i++) {
            if (dataList[i].innerText.toLowerCase()
                .includes(searchQuery.toLowerCase())) {
                dataList[i].classList.remove("d-none");
            } else {
                dataList[i].classList.add("d-none");
            }
        }
    }
</script>