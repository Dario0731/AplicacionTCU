<div class="container justify-content-center p-3 form-container">
    <div class="bg-dark p-5 rounded-5 text-secondary shadow" style="width: 25rem">
        <div class="text-white">
            <a href="<?= route('home', 'index') ?>">
                <img src="../Public/Assets/img/leave-arrow.svg" alt="Salir" style="height: 27px;">
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <img src="../Public/Assets/img/login-icon.svg" alt="login-icon" style="height: 5rem" />
        </div>
        <form class="p-3" action="/AplicacionTCU/Authentication/loginUser" method="POST">
            <div class="text-white text-center fs-1 fw-bold">Iniciar Sesión</div>
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="../Public/Assets/img/username-icon.svg" alt="username-icon" style="height: 1rem" />
                </div>
                <input name="email" class="form-control bg-light" type="text" placeholder="correo electrónico" required />
            </div>
            <div class="input-group mt-1">
                <div class="input-group-text bg-info">
                    <img src="../Public/Assets/img/password-icon.svg" alt="password-icon" style="height: 1rem" />
                </div>
                <input name="password" class="form-control bg-light" type="password" placeholder="contraseña" required />
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
            <div class="btn btn-info text-white w-100 mt-2 fw-semibold shadow-sm">
                <a class="text-decoration-none text-white text-content-center">
                    <button type="submit" class="btn text-white">Iniciar Sesión</button>
                </a>
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
                <img src="../Public/Assets/img/google-icon.svg" alt="google-icon" style="height: 1.6rem" />
                <div class="fw-semibold text-secondary">inicia sesión con Google</div>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        <?php if (isset($_SESSION['redirect-info'])) : ?>
            Swal.fire({
                icon: '<?php echo $_SESSION['redirect-info']['type']; ?>',
                title: '<?php echo $_SESSION['redirect-info']['title']; ?>',
                text: '<?php echo $_SESSION['redirect-info']['text']; ?>',
                background: 'linear-gradient(to bottom, #011242, #001136)',
                color: '#fff',
                iconColor: '#fff',
                confirmButtonColor: '#3085d6'
            });
            <?php unset($_SESSION['redirect-info']); ?>
        <?php endif; ?>
    });
</script>