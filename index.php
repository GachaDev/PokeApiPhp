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
        require_once "login.php";
        $isLogged = true;

        $emailError = false;
        $passwordError = false;

        if (isset($_POST['email']) && isset($_POST['password'])) {
            if (empty($_POST['email'])) {
                $emailError = "El email no puede estar vacío";
            } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $emailError = "El email no es válido";
            }

            if (empty($_POST['password'])) {
                $passwordError = "La contraseña no puede estar vacía";
            }

            if ($_POST['email'] && $_POST['password'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $isLogged = login($_POST['email'], $_POST['password']);
                if ($isLogged) {
                    header("Location: landing.php");
                }
            }
        }
    ?>
    <div class="login">
        <form action="index.php" method="post">
            <label for="email">Email</label>
            <input style="border: 1px solid <?= (!$isLogged || $emailError) ? 'red' : '#ccc' ?>" type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>">
            <label for="password">Contraseña</label>
            <input style="border: 1px solid <?= (!$isLogged || $passwordError) ? 'red' : '#ccc' ?>"  type="password" name="password" id="password" value="<?= isset($_POST['password']) ? $_POST['password'] : "" ?>">
            <button type="submit">Login</button>
            <?php
                if (!$isLogged && (!$emailError && !$passwordError)) {
                    echo "<span style='color: red'>Usuario o contraseña incorrectos</span>";
                }

                if (isset($_POST['email']) &&  !$_POST['email'])
                    echo "<span style='color: red'>El email no puede estar vacío</span>";

                if (isset($_POST['email']) && $_POST['email'] && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    echo "<span style='color: red'>El email no es válido</span>";

                if (isset($_POST['password']) && !$_POST['password'])
                    echo "<span style='color: red'>La contraseña no puede estar vacía</span>";
            ?>
        </form>
    </div>
</body>
</html>