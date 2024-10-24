<?php
    $salir = 1;
    include_once "BD_Conexion.php";
    session_start();

    session_destroy();
    header("location:http://mx-server04:8080/WebSiteDev/IndexGral.aspx");
    exit;
?>
