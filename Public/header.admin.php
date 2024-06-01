<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container text-white">
        <a class="navbar-brand text-white" href="<?= route('admin', 'home') ?>">
            <img src="<?= CONFIG['assets'] ?>img/home-image.svg" style="height: 50px;">
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-5">
                    <a class="nav-link text-white" href="#">Administrar Clientes</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-white" href="#">Administrar Clases</a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand text-white px-2 nav-link" href="<?= route('admin', 'information') ?>">
            <img src="<?= CONFIG['assets'] ?>img/settings-icon.svg" alt="settings" style="height: 27px;">
        </a>
        <a class="navbar-brand text-white" href="<?= route('home', 'index') ?>">
            <img src="<?= CONFIG['assets'] ?>img/session-out-icon.svg" alt="imagen de cerrar sesión" style="height: 28px;">
        </a>
    </div>
</nav>