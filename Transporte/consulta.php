<?php

if (!isset($_GET['ID'])) {
    $_GET['ID'] = '';
}

if ($_GET['ID'] == '') {
    $query_Datos = "";

} else {
    $query_Datos = "SELECT empleado.id_usuario,empleado.usuario,empleado.puesto,empleado.area,SM_AltaFinanzas.AF_Domicilio,PuntosAbordaje.Nombre_punto,PuntosAbordaje.Numero_ruta
    FROM empleado inner join SM_AltaFinanzas on empleado.id_usuario = SM_AltaFinanzas.AF_NN 
    inner join PersonalTransporte on PersonalTransporte.ID = empleado.id_usuario
    inner join PuntosAbordaje on PuntosAbordaje.Id_punto = PersonalTransporte.Id_punto
    WHERE empleado.id_usuario";


    if ($_GET["ID"] != '') {
        $query_Datos .= " = '" . $_GET['ID'] . "' ";
    }


  $query_Datos .= "";
}
?>