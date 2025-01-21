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
        
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $isLogged = login($_POST['email'], $_POST['password']);
            if ($isLogged) {
                header("Location: landing.php");
            }
        }
    ?>
    <div class="login">
        <form action="index.php" method="post">
            <label for="email">Email</label>
            <input style="border: 1px solid <?= $isLogged ? 'none' : "red" ?>" type="email" name="email" id="email" value="<?= isset($_POST['email']) ? $_POST['email'] : "" ?>">
            <label for="password">Contraseña</label>
            <input style="border: 1px solid <?= $isLogged ? 'none' : "red" ?>" type="password" name="password" id="password" value="<?= isset($_POST['password']) ? $_POST['password'] : "" ?>">
            <button type="submit">Login</button>
        </form>
        <?php
            if (!$isLogged) {
                echo "<span style='color: red'>Usuario o contraseña incorrectos</span>";
            }
        ?>
    </div>
</body>
</html>