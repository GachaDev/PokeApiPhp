<?php
    session_start(); // Iniciar sesión
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <img src="https://raw.githubusercontent.com/PokeAPI/media/master/logo/pokeapi_256.png" alt="Logo">
        <nav>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="landing.php">Inicio</a>
                <a href="logout.php">Cerrar sesión</a>
            <?php else: ?>
                <a href="register.php">Registro</a>
                <a href="index.php">Iniciar sesión</a>
            <?php endif; ?>
        </nav>
    </header>
</body>
</html>