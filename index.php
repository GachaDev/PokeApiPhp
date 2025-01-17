<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "login.php";
        $isLogged = true;
        
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $isLogged = login($_POST['email'], $_POST['password']);
            if ($isLogged) {
                header("Location: landing.php");
            }
        }
    ?>
    <form action="index.php" method="post">
        <label for="email">Email</label>
        <input style="border: 1px solid <?= $isLogged ? 'none' : "red" ?>" type="email" name="email" id="email">
        <label for="password">Contraseña</label>
        <input style="border: 1px solid <?= $isLogged ? 'none' : "red" ?>" type="password" name="password" id="password">
        <input type="submit" value="Login">
    </form>
    <?php
        if (!$isLogged) {
            echo "<span style='color: red'>Usuario o contraseña incorrectos</span>";
        }
    ?>
</body>
</html>