<?php include_once "BD_Conexion.php";?>

<?php
$ID=$_POST["ID"];
$Nombre=$_POST["Nombre"];
$fecha1=$_POST["fecha1"];
$fecha2=$_POST["fecha2"];
$tipo_turno=$_POST["tipo_turno"];
$turno=$_POST["turno"];
$Horario=$_POST["Horario"];
$FechaSolicitud=$_POST["FechaSolicitud"];
$Hora = $_POST["Hora"];
$Responsable=$_POST["Responsable"];

 $query="INSERT INTO SolicitudTransporte 
                          ([ID],
                          [Nombre] ,
                          [fecha_inicio] ,
                          [fecha_fin],
                          [tipo_turno] ,
                          [turno] ,
                          [Horario] ,
                          [FechaSolicitud],
                          [Hora],  
                          [Responsable] ,
                          [Estatus],
                          [TEspecial]) 
VALUES ('$ID','$Nombre','$fecha1','$fecha2','$tipo_turno','$turno','$Horario','$FechaSolicitud','$Hora','$Responsable','1','2')";

$res=sqlsrv_prepare($conn,$query);

if(sqlsrv_execute($res)){

    echo ("<script>(alert('Transporte Especial Sabado Solicitado'))
location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/Sabado.php';
        </script>");
}else{
    echo ("<script>(alert('Error al Solicitar Transporte Especial'))
    location.href ='http://mx-server08:8080/SistemaTansporte/Transporte/Sabado.php';
            </script>");
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

