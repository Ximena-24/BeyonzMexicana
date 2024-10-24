<?php include_once "BD_Conexion.php"; ?>

<?php
$fecha1 = $_POST["fecha1"];
$fecha2 = $_POST["fecha2"];
$tipo_turno = $_POST["tipo_turno"];
$turno = $_POST["turno"];
$TiempoExSI = $_POST["TiempoExSI"];

if (!empty($_POST["lunes"])) {
    $lunes = $_POST["lunes"]; 
}
if (!empty($_POST["martes"])) {
    $martes = $_POST["martes"]; 
}
if (!empty($_POST["miercoles"])) {
    $miercoles = $_POST["miercoles"]; 
}
if (!empty($_POST["jueves"])) {
    $jueves = $_POST["jueves"]; 
}
if (!empty($_POST["viernes"])) {
    $viernes = $_POST["viernes"]; 
}
if (!empty($_POST["sabado"])) {
    $sabado = $_POST["sabado"]; 
}
$FechaSolicitud = $_POST["FechaSolicitud"];
$Hora = $_POST["Hora"];
$Responsable = $_POST["Responsable"];
$Lista = $_POST["asistentes"];

$ListaArray = explode(",", "$Lista");

$Tamaño = sizeof($ListaArray);

for ($i = 0; $i <= ($Tamaño - 1); $i++) {

 $query = "INSERT INTO SolicitudTransporte 
                                ([ID],
                                [fecha_inicio] ,
                                [fecha_fin],
                                [tipo_turno] ,
                                [turno] ,
                                [TiempoExSI] ,
                                [lunes] ,
                                [martes] ,
                                [miercoles] ,
                                [jueves] ,
                                [viernes] ,
                                [sabado] ,
                                [FechaSolicitud],
                                [Hora], 
                                [Responsable] ,
                                [Estatus],
                                [TEspecial]) 

VALUES ('$ListaArray[$i]','$fecha1','$fecha2','$tipo_turno','$turno','$TiempoExSI','$lunes','$martes','$miercoles','$jueves','$viernes','$sabado','$FechaSolicitud','$Hora','$Responsable','1','1')";
$res = sqlsrv_prepare($conn, $query);
if (sqlsrv_execute($res)) {

    echo ("<script>(alert('Transporte Solicitado'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.0.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Solicitar'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.0.php';
            </script>");
}
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



