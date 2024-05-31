<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container text-white">
        <a class="navbar-brand text-white" href="#"><img src="../Public/Assets/img/home-image.svg" style="height: 50px;"></a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-5">
                    <a class="nav-link text-white" href="#">Administrar Clientes</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-white" href="#">Administrar Clases</a>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-white" href="#">Administrar página principal</a>
                </li>
            </ul>
        </div>
        <a class="navbar-brand text-white px-2" href="<?= route('home', 'index') ?>">
            <img src="../Public/Assets/img/settings-icon.svg" alt="settings" style="height: 27px;">
        </a>
        <a class="navbar-brand text-white" href="<?= route('home', 'index') ?>">Cerrar Sesión</a>
    </div>
</nav>