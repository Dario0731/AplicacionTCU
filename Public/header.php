<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= route('', 'index'); ?>" class="nav-link px-2 text-light">Inicio</a></li>
            </ul>
            <div class="text-end">
                <a class="btn btn-secondary me-2" href="<?= route('authentication', 'register') ?>">Registrarse</a>
                <a class="btn btn-secondary" href="<?= route('authentication', 'login') ?>">Iniciar Sesion</a>
            </div>
        </div>
    </div>
</header>