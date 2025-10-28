<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="diseñologin.css">
</head>
<body>

  <div id="navbar">
    <a class="active" href="javascript:void(0)">GedG</a>
  </div>

  <div class="login-container">
    <div class="login-box">
      <h2>Iniciar Sesión</h2>
      <form action="controlador.php" method="POST">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" placeholder="Ingrese su usuario" required />

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" placeholder="Ingrese su contraseña" required />

        <button type="submit" name="submit">Iniciar Sesión</button>
      </form>
    </div>
  </div>

</body>
</html>
