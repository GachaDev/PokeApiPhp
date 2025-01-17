<?php
    require_once "json_handler.php";

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nombre'])) {
        $usuarios = loadEventsFromJson();

        for ($i = 0; $i < count($usuarios); $i++) {
            if ($usuarios[$i]['email'] == $_POST['email']) {
                echo "Email ya registrado";
                exit;
            }
        }

        $usuarios[] = [
            'nombre' => $_POST['nombre'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        saveEventsToJson($usuarios);

        header("Location: index.php");
    } else {
        header("Location: register.php");
    }
?>