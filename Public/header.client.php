<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container text-white">
        <a class="navbar-brand text-white" href="<?= route('client', 'home') ?>">
            <img src="<?= CONFIG['assets'] ?>img/home-image.svg" style="height: 50px;">
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="px-1" src="<?= CONFIG['assets'] ?>img/clients-icon.svg" alt="imagen de administrar clientes" style="height: 23px;">
                        Mis datos
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="#">
                            Mi progreso
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="#">
                            Ver Clases
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-brand text-white px-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= CONFIG['assets'] ?>img/settings-icon.svg" alt="settings" style="height: 27px;">
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('client', 'information') ?>">
                            <img class="px-1" src="<?= CONFIG['assets'] ?>img/update-data-icon.svg" alt="imagen de actualizar los datos personales" style="height: 17px;">
                            Actualizar datos
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('client', 'passwordAct') ?>">
                            <img class="px-1" src="<?= CONFIG['assets'] ?>img/update-data-icon.svg" alt="imagen de actualizar los datos personales" style="height: 17px;">
                            Cambiar contraseña
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('client', 'coachInfo') ?>">
                            <img class="px-1" src="<?= CONFIG['assets'] ?>img/update-data-icon.svg" alt="imagen de actualizar los datos personales" style="height: 17px;">
                            Información del coach
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <a class="navbar-brand text-white" href="<?= route('home', 'index') ?>">
            <img src="<?= CONFIG['assets'] ?>img/session-out-icon.svg" alt="imagen de cerrar sesión" style="height: 28px;">
        </a>
    </div>
</nav>