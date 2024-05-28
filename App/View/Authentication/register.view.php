<?php include(CONFIG['public_path'].'header.php'); ?>

<div class="container justify-content-center p-3 py-2 form-container">
    <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="d-flex justify-content-center">
            <img src="../Public/Assets/img/login-icon.svg" alt="login-icon" style="height: 5rem" />
        </div>
        <div class="text-white text-center fs-1 fw-bold">Registrarse</div>
        <div class="input-group mt-4">
            <div class="input-group-text bg-info">
                <img src="../Public/Assets/img/username-icon.svg" alt="username-icon" style="height: 1rem" />
            </div>
            <input class="form-control bg-light" type="text" placeholder="correo electrónico" />
        </div>
        <div class="input-group mt-1">
            <div class="input-group-text bg-info">
                <img src="../Public/Assets/img/password-icon.svg" alt="password-icon" style="height: 1rem" />
            </div>
            <input class="form-control bg-light" type="password" placeholder="contraseña" />
        </div>
        <div class="input-group mt-1">
            <div class="input-group-text bg-info">
                <img src="../Public/Assets/img/password-icon.svg" alt="password-icon" style="height: 1rem" />
            </div>
            <input class="form-control bg-light" type="password" placeholder="confirmar contraseña" />
        </div>
        <div class="btn btn-info text-white w-100 mt-4 fw-semibold shadow-sm">
            Registrarse
        </div>
        <div class="d-flex gap-1 justify-content-center mt-1">
            <div>¿Ya posees una cuenta?</div>
            <a href="<?= route('authentication', 'login') ?>" class="text-decoration-none text-info fw-semibold">Iniciar Sesión</a>
        </div>
        <div class="p-3">
            <div class="text-center text-white" style="height: 1.1rem">
                <span class="px-3">o</span>
            </div>
        </div>
        <div class="btn d-flex gap-2 justify-content-center border mt-3 shadow-sm">
            <img src="../Public/Assets/img/google-icon.svg" alt="google-icon" style="height: 1.6rem" />
            <div class="fw-semibold text-secondary">Registrarse con Google</div>
        </div>
    </div>
</div>