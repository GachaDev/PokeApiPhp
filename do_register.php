<?php
    require_once "json_handler.php";

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nombre'])) {
        $usuarios = loadEventsFromJson();
        $error = false;
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = [];

        // Validar campos vacíos
        if (empty($nombre)) {
            $errors['nombre'] = "El nombre no puede estar vacío";
        }

        if (empty($email)) {
            $errors['email'] = "El email no puede estar vacío";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "El email no es válido";
        }

        if (empty($password)) {
            $errors['password'] = "La contraseña no puede estar vacía";
        }

        // Verificar si el email ya está registrado
        foreach ($usuarios as $usuario) {
            if ($usuario['email'] === $email && $email) {
                $errors['email'] = "Este email ya ha sido registrado";
                break;
            }
        }

        // Si no hay errores, guardo el usuario en el json y redirijo a la página de iniciar sesión
        if (empty($errors)) {
            $usuarios[] = [
                'nombre' => $_POST['nombre'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ];

            saveEventsToJson($usuarios);

            header("Location: index.php");
        } else {
            require_once "register.php";
        }
    } else {
        header("Location: register.php");
    }
?>