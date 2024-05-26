<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= route('', '') ?>" class="nav-link px-2 text-light">Inicio</a></li>
            </ul>
            <div class="text-end">
                <a class="btn me-2 text-white" href="<?= route('authentication', 'register') ?>">Registrarse</a>
                <a class="btn me-2 text-white" href="<?= route('authentication', 'login') ?>">Iniciar Sesión</a>
            </div>
        </div>
    </div>
</header>