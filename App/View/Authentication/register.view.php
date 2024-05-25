<div class="container justify-content-center p-3 form-container">
    <form class="p-1" action="/PhpProject/Authentication/registUser" method="POST">
        <div class="container p-5">
            <h1>Registrarse</h1>
        </div>
        <div class="mb-3">
            <label class="form-label">Ingrese el correo</label>
            <input name="email" type="email" class="form-control" placeholder="correo electrónico">
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input name="password" type="password" class="form-control" placeholder="contraseña">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" placeholder="confirmar contraseña">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>