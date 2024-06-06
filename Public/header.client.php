<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container">
        <a href="<?= route('home', 'index') ?>" class="navbar-brand text-white">Inicio</a>
        <div class="text-white">
            <a class="btn me-2 text-white" href="<?= route('authentication', 'register') ?>">Registrarse</a>
            <a class="btn me-2 text-white" href="<?= route('authentication', 'login') ?>">Iniciar Sesión</a>

        </div>

    </div>
            <li class="nav-item px-5">
            <a class="nav-link text-white" href="<?= route('client', 'coachInfo') ?>">
                <img class="px-1" src="<?= CONFIG['assets'] ?>img/clients-icon.svg" alt="imagen de administrar clientes" style="height: 23px;">
                Ver coach
            </a>
        </li>
</nav>