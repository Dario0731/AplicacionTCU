<header class="p-3 text-white">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="<?= route('home', 'index') ?>" class="navbar-brand text-white">Inicio</a>
            <div class="text-white">
                <a class="btn me-2 text-white" href="<?= route('authentication', 'register') ?>">Registrarse</a>
                <a class="btn me-2 text-white" href="<?= route('authentication', 'login') ?>">Iniciar Sesión</a>
            </div>
        </div>
    </nav>
</header>