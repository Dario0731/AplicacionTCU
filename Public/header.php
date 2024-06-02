<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container">
        <a class="navbar-brand text-white" href="<?= route('home', 'index') ?>">
            <img src="<?= CONFIG['assets'] ?>img/home-image.svg" style="height: 50px;">
        </a>
        <div class="text-white">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-brand text-white px-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= CONFIG['assets'] ?>img/user-icon.svg" alt="Session" style="height: 27px;">
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('authentication', 'register') ?>">
                            Registrarse
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('authentication', 'login') ?>">
                            Iniciar sesión
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>