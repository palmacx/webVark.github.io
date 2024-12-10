<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="icon" href="img/logo.ico">
    <link rel="stylesheet" href="estyle.css">
</head>
<body>
    <form class="form-box" action="login.php" method="POST">
        <h1 class="form-title">Iniciar Sesión</h1>
        <input type="email" name="co" placeholder="Correo electrónico" required>
        <input type="password" name="contra" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar Sesión" class="boto">
        <a href="register.php">¿No tienes una cuenta? Regístrate</a>
    </form>
</body>
</html>
