<?php
    session_start(); // Iniciar sesión
    session_destroy(); // Cerrar sesión
    header("Location: index.php"); // Redirigir al login
    exit();
?>