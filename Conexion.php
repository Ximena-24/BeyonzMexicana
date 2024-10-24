<?php

$serverName = "mx-server04\beyonzmex"; //serverName\instanceName
$connectionInfo = array(
    "Database" => "BEYONZ", //Nombre de la BD
    "UID" => "sa", //Usuario de la BD
    "PWD" => "BYZ@en2o", //Contraseña de la BD
    "CharacterSet"=>"UTF-8"
); 

$conn = sqlsrv_connect($serverName, $connectionInfo);
    if( $conn ) {
       // echo "Conexion a la BD Exitosamente.<br />";
    }else{
        //echo "No se Conecto a la BD.<br />";
        die( print_r( sqlsrv_errors(), true));
    }
 ?>


