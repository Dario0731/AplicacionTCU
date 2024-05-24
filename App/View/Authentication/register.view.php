<div class="container d-flex justify-content-center p-3">
    <form class="p-3"  action="/PhpProject/Authentication/registUser" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Ingrese el correo</label>
            <input name= "email" type="email" class="form-control" placeholder="correo electrónico">
        </div>
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input name= "password" type="password" class="form-control" placeholder="contraseña">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" class="form-control" placeholder="confirmar contraseña">
        </div>
        <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
</div>