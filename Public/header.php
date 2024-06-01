<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container">
        <a class="navbar-brand text-white" href="<?= route('home', 'index') ?>">
            <img src="<?= CONFIG['assets']?>img/home-image.svg" style="height: 50px;">
        </a>
        <div class="text-white">
            <a class="btn me-2 text-white" href="<?= route('authentication', 'register') ?>">Registrarse</a>
            <a class="btn me-2 text-white" href="<?= route('authentication', 'login') ?>">Iniciar Sesión</a>
        </div>
    </div>
</nav>