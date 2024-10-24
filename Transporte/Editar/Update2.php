<?php include_once "../../BD_Conexion.php";

$id_solicitud = $_POST['id_solicitud'];

$ID = $_POST['ID'];
$Nombre = $_POST['Nombre'];
$fecha1 = $_POST["fecha1"];
$fecha2 = $_POST["fecha2"];
$tipo_turno = $_POST['tipo_turno'];
$turno = $_POST['turno'];
$Horario = $_POST['Horario'];
$FechaSolicitud = $_POST['FechaSolicitud'];
$Responsable = $_POST['Responsable'];


 $query = "UPDATE [dbo].[SolicitudTransporte]
     SET [ID] = '$ID'
        ,[Nombre] = '$Nombre'
        ,[fecha_inicio] = '$fecha1'
        ,[fecha_fin] = '$fecha2'
        ,[tipo_turno] = '$tipo_turno'
        ,[turno] = '$turno'
        ,[Horario] = '$Horario'
        ,[FechaSolicitud] = '$FechaSolicitud'
        ,[Responsable] = '$Responsable'
        ,[Estatus] = '1'
        ,[TEspecial] = '2'
        WHERE id_solicitud = $id_solicitud";

$ejecutar = sqlsrv_query($conn, $query);

if ($ejecutar) {
    echo ("<script>(alert('Solicitud actualizada'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.php';
        </script>");
} else {
    echo ("<script>(alert('Error al Actualizar'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/PreListado2.php';
        </script>");
}
?>
