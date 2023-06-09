<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="<?= base_url("") ?>">
            <img src="<?= base_url() ?>assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <?php if ($user["role_id"] == 2) : ?>
                <span class="ms-1 font-weight-bold text-white">Admin Dashboard</span>
            <?php else : ?>
                <span class="ms-1 font-weight-bold text-white">Operator Dashboard</span>
            <?php endif ?>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white <?php if (isset($dashboard)) : echo 'active bg-gradient-primary' ?>
                <?php endif; ?>" href="<?= base_url("user") ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if (isset($history)) : echo 'active bg-gradient-primary' ?>
                <?php endif; ?>" href="<?= $user["role_id"] == 1 ?  base_url("user/history") :  base_url("admin/history") ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">History</span>
                </a>
            </li>
            <?php if ($user["role_id"] == 2) : ?>
                <li class="nav-item">
                    <a class="nav-link text-white <?php if (isset($users)) : echo 'active bg-gradient-primary' ?>
                    <?php endif; ?>" href="<?= base_url("admin/users") ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">person</i>
                        </div>
                        <span class="nav-link-text ms-1">Users</span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white <?php if (isset($profile)) : echo 'active bg-gradient-primary' ?>
                <?php endif; ?>" href="<?= $user["role_id"] == 1 ?  base_url("user/profile") :  base_url("admin/profile")  ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="<?= base_url("auth/logout") ?>">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">

    </div>
</aside>