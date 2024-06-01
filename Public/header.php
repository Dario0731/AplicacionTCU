<nav class="navbar navbar-expand-lg navbar-gradient">
    <div class="container">
        <a class="navbar-brand text-white" href="<?= route('home', 'index') ?>">
            <img src="<?= CONFIG['assets'] ?>img/home-image.svg" style="height: 50px;">
        </a>
        <div class="text-white">
            <a class="btn me-2 text-white" href="<?= route('authentication', 'register') ?>">
                <img src="<?= CONFIG['assets'] ?>img/register-icon.svg" alt="Inicio de sesion" style="height: 27px;">
            </a>
            <a class="btn me-2 text-white" href="<?= route('authentication', 'login') ?>">
                <img src="<?= CONFIG['assets'] ?>img/user-icon.svg" alt="Inicio de sesion" style="height: 27px;">
            </a>
        </div>
    </div>
</nav>