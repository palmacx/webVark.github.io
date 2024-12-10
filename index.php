<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="estyle.css">
</head>
<body>
    <form action="conc.php" class="form-box" method="POST">
        <h1 class="form-title">Inicia sesión</h1>
        <input type="email" name="co" placeholder="Correo electrónico"> <!-- placeholder muestra algo por pantalla   color 7810C0-->
        <input type="password" name="contra" placeholder="Contraseña">
        <input type="submit" value="Iniciar sesión" name="btnin" class="boto">
        <a href="">¿No recuerdas tu contraseña?</a> <br>
        <a href="regisUsuario.html">¿No tienes cuenta? Regístrate</a>
    </form>
</body>
</html>