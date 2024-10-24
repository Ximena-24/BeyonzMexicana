<?php include_once "BD_Conexion.php"; ?>

<?php
$ID=$_POST["ID"];
$Nombre=$_POST["Nombre"];
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];
$tipo_turno=$_POST["tipo_turno"];
$turno=$_POST["turno"];
$Horario=$_POST["Horario"];
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

$FechaSolicitud=$_POST["FechaSolicitud"];
$Hora = $_POST["Hora"];
$Responsable=$_POST["Responsable"];
$Lista = $_POST["asistentes"];

$ListaArray = explode(",", "$Lista");

$Tamaño = sizeof($ListaArray);

for ($i = 0; $i <= ($Tamaño - 1); $i++) {

    echo $query = "INSERT INTO SolicitudTransporte 
                                ([ID],
                                [fecha_inicio] ,
                                [fecha_fin],
                                [tipo_turno] ,
                                [turno] ,
                                [Horario] ,
                                [lunes] ,
                                [martes] ,
                                [miercoles] ,
                                [jueves] ,
                                [viernes] ,
                                [FechaSolicitud],
                                [Hora], 
                                [Responsable] ,
                                [Estatus],
                                [TEspecial]) 

VALUES ('$ListaArray[$i]','$fecha1','$fecha2','$tipo_turno','$turno','$Horario','$lunes','$martes','$miercoles','$jueves','$viernes','$FechaSolicitud','$Hora','$Responsable','1','2')";
$res = sqlsrv_prepare($conn, $query);
if (sqlsrv_execute($res)) {

    echo ("<script>(alert('Transporte Solicitado'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Solicitar'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.php';
            </script>");
}
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



