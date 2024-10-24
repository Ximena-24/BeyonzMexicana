<?php include_once "../../BD_Conexion.php";

$id_solicitud = $_POST['id_solicitud'];

$ID = $_POST['ID'];
$Nombre = $_POST['Nombre'];
$fecha1 = $_POST["fecha1"];
$fecha2 = $_POST["fecha2"];
$tipo_turno = $_POST['tipo_turno'];
$turno = $_POST['turno'];
$TiempoExSI = $_POST['TiempoExSI'];

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

$FechaSolicitud = $_POST['FechaSolicitud'];
$Responsable = $_POST['Responsable'];


 $query = "UPDATE [dbo].[SolicitudTransporte]
     SET [ID] = '$ID'
        ,[Nombre] = '$Nombre'
        ,[fecha_inicio] = '$fecha1'
        ,[fecha_fin] = '$fecha2'
        ,[tipo_turno] = '$tipo_turno'
        ,[turno] = '$turno'
        ,[TiempoExSI] = '$TiempoExSI'
        ,[lunes] = '$lunes'
        ,[martes] = '$martes'
        ,[miercoles] = '$miercoles'
        ,[jueves] = '$jueves'
        ,[viernes] = '$viernes'
        ,[sabado] = '$sabado'
        ,[FechaSolicitud] = '$FechaSolicitud'
        ,[Responsable] = '$Responsable'
        ,[Estatus] = '1'
        ,[TEspecial] = '1'
        WHERE id_solicitud = $id_solicitud";

$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Solicitud actualizada'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.0.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Actualizar'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.0.php';
        </script>");
}
?>
