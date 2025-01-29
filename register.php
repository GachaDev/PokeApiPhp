<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once "header.php";

        if (isset($_SESSION['user'])) {
            header("Location: landing.php"); // Redirigir al landing si hay sesión activa
            exit();
        }
    ?>
    <div class="register">
        <form action="do_register.php" method="post">
            <label for="nombre">Nombre</label>
            <input  style="border-color: <?= isset($errors['nombre']) ? 'red' : '#ccc'; ?>"  type="text" name="nombre" id="nombre" value="<?= $nombre ?? '' ?>">
            <label for="email">Email</label>
            <input style="border-color: <?= isset($errors['email']) ? 'red' : '#ccc' ?>" type="email" name="email" id="email" value="<?= $email ?? '' ?>">
            <label for="password">Contraseña</label>
            <input style="border-color: <?= isset($errors['password']) ? 'red' : '#ccc' ?>" type="password" name="password" id="password" value="<?= $password ?? '' ?>">
            <button type="submit">Registrar</button>
            <?php if (isset($errors)): ?>
                <p class="error">
                    <?php foreach ($errors as $error): ?>
                        <?= $error ?><br>
                    <?php endforeach; ?>
                </p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>