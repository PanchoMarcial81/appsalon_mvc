<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta</p>

<?php include_once __DIR__."/../templates/alertas.php"; ?>

<form action="/crear-cuenta" method="POST" class="formulario">
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo s($usuario->nombre) ?>" placeholder="Tu Nombre">
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" value="<?php echo s($usuario->apellido) ?>" placeholder="Tu Apellido">
    </div>

    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel" name="telefono" id="telefono" value="<?php echo s($usuario->telefono) ?>" placeholder="Tu Teléfono">
    </div>

    <div class="campo">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="<?php echo s($usuario->email) ?>" placeholder="Tu E-mail">
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Tu Password">
    </div>

    <input type="submit" value="Crear Cuenta" class="boton">
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu password?</a>
</div>