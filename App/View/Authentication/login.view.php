<?php include(CONFIG['public_path'].'header.php'); ?>

<div class="container justify-content-center p-3 form-container">
    <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <!--<img src="Public/img/login-icon.svg" alt="login-icon" style="height: 7rem" />-->
        </div>
        <div class="text-white text-center fs-1 fw-bold">Iniciar Sesión</div>
        <div class="input-group mt-4">
            <div class="input-group-text bg-info">
                <!--<img src="/Public/img/username-icon.svg" alt="username-icon" style="height: 1rem" />-->
            </div>
            <input class="form-control bg-light" type="text" placeholder="correo electrónico" />
        </div>
        <div class="input-group mt-1">
            <div class="input-group-text bg-info">
                <!--<img src="/assets/password-icon.svg" alt="password-icon" style="height: 1rem" />-->
            </div>
            <input class="form-control bg-light" type="password" placeholder="contraseña" />
        </div>
        <div class="d-flex justify-content-around mt-1">
            <div class="d-flex align-items-center gap-1">
                <input class="form-check-input" type="checkbox" />
                <div class="pt-1" style="font-size: 0.9rem">Recuérdeme</div>
            </div>
            <div class="pt-1">
                <a href="#" class="text-decoration-none text-info fw-semibold fst-italic" style="font-size: 0.9rem">¿olvidaste tu contraseña?</a>
            </div>
        </div>
        <div class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">
            <a href="<?= route('home', 'admin') ?>" class="text-decoration-none text-white text-content-center">Iniciar Sesión</a>
        </div>
        <div class="d-flex gap-1 justify-content-center mt-1">
            <div>¿No posees una cuenta?</div>
            <a href="<?= route('authentication', 'register') ?>" class="text-decoration-none text-info fw-semibold">Registrarse</a>
        </div>
        <div class="p-3">
            <div class="text-center text-white" style="height: 1.1rem">
                <span class="px-3">o</span>
            </div>
        </div>
        <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
            <!--<img src="/assets/google-icon.svg" alt="google-icon" style="height: 1.6rem" />-->
            <div class="fw-semibold text-secondary">inicia sesión con Google</div>
        </div>
    </div>
</div>