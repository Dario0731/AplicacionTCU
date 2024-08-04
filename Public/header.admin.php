<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container text-white">
        <a class="navbar-brand text-white" href="<?= route('admin', 'home') ?>">
            <img src="<?= CONFIG['assets'] ?>img/logo-icon.svg" style="height: 50px;">
        </a>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item px-5">
                <li class="nav-item dropdown">
                    <a class="nav-link text-white px-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="px-1" src="<?= CONFIG['assets'] ?>img/clients-icon.svg" alt="imagen de administrar clientes" style="height: 23px;">
                        Administrar Clientes
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('admin', 'register') ?>">
                            Registrar un nuevo cliente
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('admin', 'clients') ?>">
                            Ver lista de clientes
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white px-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="px-1" src="<?= CONFIG['assets'] ?>img/clients-group-icon.svg" alt="imagen de administrar clientes" style="height: 23px;">
                        Administrar Grupos
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('sportgroup', 'registrar') ?>">
                            Registrar un nuevo grupo
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('sportgroup', 'groups') ?>">
                            Ver lista de grupos
                        </a>
                    </div>
                </li>
                </li>
                <li class="nav-item px-3">
                    <a class="nav-link text-white" href="<?= route('admin', 'callendar') ?>">
                        <img class="px-1" src="<?= CONFIG['assets'] ?>img/calendar-icon.svg" alt="imagen de administrar clases" style="height: 23px;">
                        Calendario
                    </a>
                </li>   
            </ul>
        </div>
        <div id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-brand text-white px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="px-1" src="<?= CONFIG['assets'] ?>img/calendar-icon.svg" alt="imagen de administrar clases" style="height: 23px;">
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('Event', 'newEvent') ?>">
                            Crear eventos
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('Event', 'listEvents') ?>">
                            Ver eventos
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-brand text-white px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= CONFIG['assets'] ?>img/message-icon.svg" alt="settings" style="height: 25px;">
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('CoachMessenger', 'clientMessage') ?>">
                            Enviar Mensaje
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('coachmessenger', 'myMessages') ?>">
                            Bandeja de entrada
                        </a>
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('coachmessenger', 'mySendMessages') ?>">
                            Ver mensajes enviados
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link navbar-brand text-white px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?= CONFIG['assets'] ?>img/settings-icon.svg" alt="settings" style="height: 27px;">
                    </a>
                    <div class="dropdown-menu navbar-gradient text-white">
                        <a class="dropdown-item text-white navbar-gradient" href="<?= route('admin', 'information') ?>">
                            <img class="px-1" src="<?= CONFIG['assets'] ?>img/update-data-icon.svg" alt="imagen de actualizar los datos personales" style="height: 17px;">
                            Actualizar datos
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