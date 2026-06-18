<?php
$current_url = $_SERVER['REQUEST_URI'];

?>

<style>
    .sidebar-modern {
        background-color: #1a1b1d !important;
        border-right: none !important;
        border-radius: 0px 0px 0px 0px;
    }

    .sidebar-header-text {
        color: #ffffff;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .nav-modern .nav-link {
        color: #8a8a98 !important;
        border-radius: 32px;
        padding: 8px 12px;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
    }

    .nav-modern .nav-link:hover {
        color: #ffffff !important;
        background-color: rgba(255, 255, 255, 0.05);
        letter-spacing: 2px;
    }

    .nav-modern .nav-link.active {
        background-color: #d4f55a !important;
        color: #1c1c24 !important;
        font-weight: 700;
    }

    .nav-modern .nav-link i {
        font-size: 1rem;
    }

    .nav-modern .nav-link.active i {
        color: #1c1c24 !important;
    }

    .custom-toggler {
        background-color: #78787835;
    }


    .profil-container {
        display: flex;
        align-items: center;
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.05);
        border-radius: 10px;
        margin-bottom: 20px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .profil-foto {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #d4f55a;
    }

    .profil-info {
        margin-left: 12px;
    }

    .profil-nama {
        color: #ffffff;
        font-weight: 700;
        margin: 0;
        font-size: 1rem;
    }

    .profil-status {
        color: #d4f55a;
        font-size: 0.75rem;
        font-weight: 600;
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .bottom-accent-card {
        background-image: url('/CRUD_Noble/data/assets/image/chaldea.gif');
        border-radius: 16px;
        padding: 18px;
        color: #1c1c24;
        text-align: left;
    }

    @media (max-width: 767.98px) {

        main,
        .main-content {
            margin-left: 0 !important;
        }
    }
</style>

<nav class="navbar d-md-none px-3 sticky-top" style="background-color: #1b161d;">
    <span class="navbar-brand sidebar-header-text mb-0 h1 text-white">
        <i class="bi bi-shield-check me-2" style="color: #d4f55a;"></i>Welcome Bos
    </span>
    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
        <i class="bi bi-list text-white fs-1"></i>
    </button>
</nav>

<div class="offcanvas-md offcanvas-start sidebar-modern" tabindex="-1" id="sidebarMenu" style="width: 260px; min-height: 100vh; position: fixed; top: 0; left: 0; z-index: 1055;">
    <div class="offcanvas-header d-md-none border-bottom border-secondary">
        <h5 class="offcanvas-title sidebar-header-text">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
    </div>


    <div class="offcanvas-body d-flex flex-column p-4 h-100">
        <a href="../../data.php" class="d-none d-md-flex align-items-center mb-4 text-decoration-none">
            <i class="bi bi-hexagon-fill fs-3 me-2" style="color: #ffffff;"></i>
            <span class="fs-4 sidebar-header-text">Welcome Bos</span>
        </a>

        <div class="profil-container">
            <img src="/CRUD_Noble/data/assets/image/profile.jpg" alt="Foto Profil" class="profil-foto">
            <div class="profil-info">
                <p class="profil-nama">Master</p>
                <p class="profil-status">Administrator</p>
            </div>
        </div>

        <ul class="nav nav-modern flex-column gap-2">
            <li class="nav-item">
                <a href="/CRUD_Noble/index.php" class="nav-link <?= strpos($current_url, 'index.php') !== false ? 'active' : '' ?>">
                    <i class="bi bi-grid-1x2-fill me-3"></i>Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="/CRUD_Noble/data.php" class="nav-link <?= (strpos($current_url, 'data.php') !== false || strpos($current_url, 'dashboard.php') !== false) ? 'active' : '' ?>">
                    <i class="bi bi-hdd-stack-fill me-3"></i>Data Museum
                </a>
            </li>

            <li class="nav-item">
                <a href="/CRUD_Noble/data/proses/tambah.php" class="nav-link <?= strpos($current_url, 'tambah.php') !== false ? 'active' : '' ?>">
                    <i class="bi bi-plus-square-fill me-3"></i>Tambah Data
                </a>
            </li>
            <li class="nav-item">
                <a href="/CRUD_Noble/data/partials/user.php" class="nav-link <?= strpos($current_url, 'user.php') !== false ? 'active' : '' ?>">
                    <i class="bi bi-person-circle me-3"></i>User
                </a>
            </li>
        </ul>


        <br><br>
        <div class="mt-auto pt-3">
            <div class="bottom-accent-card mb-4 shadow-sm">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <i class="bi bi-arrow-up-right-circle-fill fs-4"></i>
                </div>
                <h6 class="fw-bold mb-1">Chaldea Terminal</h6>
                <small style="font-weight: 500; opacity: 0.8;">System Online</small>
            </div>

            <a href="/CRUD_Noble/data/login/logout.php" class="nav-link text-danger d-flex align-items-center rounded p-2" style="transition: 0.3s;" onmouseover="this.style.backgroundColor='rgba(220, 53, 69, 0.1)'" onmouseout="this.style.backgroundColor='transparent'" onclick="return confirm('Apakah Anda yakin ingin keluar?');">
                <i class="bi bi-box-arrow-left me-3 fs-5"></i>
                <span class="fw-bold">Sign out</span>
            </a>
        </div>

    </div>
</div>

<script src="data/src/js/bootstrap.bundle.min.js"></script>