<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="<?= ROUTE('Home', 'index'); ?>" class="nav-link px-2 text-secondary">Inicio</a></li>
                <li><a href="<?= ROUTE('Home', 'about'); ?>" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <div class="text-end">
                <a type="button" class="btn btn-outline-light me-2" href="<?= route('authentication', 'login') ?>">Login</a>
                <a type="button" class="btn btn-warning" >Sign-up</a>
            </div>
        </div>
    </div>
</header>