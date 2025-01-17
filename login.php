<?php
    require_once "json_handler.php";
    function login($emailIntroduced, $passwordIntroduced) {
        $usuarios = loadEventsFromJson();
        $nombre = "";

        if (isset($_POST['email']) && isset($_POST['password'])) {
            $logged = false;

            foreach ($usuarios as $usuario) {
                if ($usuario['email'] == $emailIntroduced && $usuario['password'] == $passwordIntroduced) {
                    $logged = true;
                    $nombre = $usuario['nombre'];
                    break;
                }
            }

            return $logged;
        }
    }
?>