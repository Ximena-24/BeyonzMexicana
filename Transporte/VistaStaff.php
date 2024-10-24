<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes</title>
</head>
<body>

  <form class="formulario" action="Solicitud.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header container-fluid">
                <div class="row">
                  <h4><i class='fa fa-bus'></i> Solicitudes de Transporte Realizadas por:
                    <?php $Usuario = $_SESSION['UserName'];
                    echo "<h3 class='nav-link' style='color: #005117;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
                  </h4>
                </div>
              </div>

              <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped display nowrap" style="width:100%">
                  <thead style="text-align: center;">
                    <tr>
                      <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nomina </th>
                      <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                      <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">Fecha Inicio</th>
                      <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">Fecha Fin</th>
                      <th class="sorting text-center" aria-label="">Telefono</th>
                      <th class="sorting text-center" aria-label="">Domicilio</th>
                      <th class="sorting text-center" aria-label="">Punto</th>
                      <th class="sorting text-center" aria-label="">Ruta</th>
                      <th class="sorting text-center" aria-label="">T. Turno</th>
                      <th class="sorting text-center" aria-label="">Turnos</th>
                      <th class="sorting text-center" aria-label="">T. Extra</th>
                      <th class="sorting text-center" aria-label="">Horario</th>
                      <th class="sorting text-center" aria-label="">Lunes</th>
                      <th class="sorting text-center" aria-label="">Martes</th>
                      <th class="sorting text-center" aria-label="">Miercoles</th>
                      <th class="sorting text-center" aria-label="">Jueves</th>
                      <th class="sorting text-center" aria-label="">Viernes</th>
                      <th class="sorting text-center" style="background-color: red;" aria-label="">FechaSolicitud</th>
                      <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
                      <th class="sorting text-center" aria-label="">Edit</th>
                    </tr>
                  </thead>

                  <tbody style="text-align: center;">
                    <?php
                    $query = "SELECT SolicitudTransporte.ID,SolicitudTransporte.Nombre,SolicitudTransporte.fecha_inicio,SolicitudTransporte.fecha_fin,SM_AltaFinanzas.AF_TelefonoC,
                    SM_AltaFinanzas.AF_Domicilio,PersonalTransporte.Id_punto,PuntosAbordaje.Nombre_punto,SR_RUTAS.ID_RUTA
                    ,SolicitudTransporte.tipo_turno,
                    SolicitudTransporte.turno,SolicitudTransporte.TiempoExSi,SolicitudTransporte.Horario,SolicitudTransporte.lunes,SolicitudTransporte.martes,SolicitudTransporte.miercoles,
                    SolicitudTransporte.jueves,SolicitudTransporte.viernes,SolicitudTransporte.FechaSolicitud,SolicitudTransporte.Responsable
                    FROM SolicitudTransporte INNER JOIN SM_AltaFinanzas ON SolicitudTransporte.ID = SM_AltaFinanzas.AF_NN
                    INNER JOIN PersonalTransporte ON PersonalTransporte.ID = SolicitudTransporte.ID
                    INNER JOIN PuntosAbordaje ON PuntosAbordaje.Id_punto =PersonalTransporte.Id_punto
                    INNER JOIN SR_RUTAS ON SR_RUTAS.ID_RUTA = PuntosAbordaje.Numero_ruta 
                    WHERE SolicitudTransporte.Estatus = 1 and SolicitudTransporte.TEspecial = 1 
                    and SolicitudTransporte.Responsable = '$Usuario'";

                    $result = sqlsrv_query($conn, $query);

                    while ($row = sqlsrv_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td style='font-weight: bold;'>" . $row['ID'] . "</td>";
                      echo "<td>" . $row['Nombre'] . "</td>";
                      echo "<td>" . $dias_espaniol[date_format($row['fecha_inicio'], 'w')] . date_format($row['fecha_inicio'], ' d/m/y') . "</td>";
                      echo "<td>" . $dias_espaniol[date_format($row['fecha_fin'], 'w')] . date_format($row['fecha_fin'], ' d/m/y') . "</td>";
                      echo "<td>" . $row['AF_TelefonoC'] . "</td>";
                      echo "<td>" . $row['AF_Domicilio'] . "</td>";
                      echo "<td>" . $row['Nombre_punto'] . "</td>";
                      echo "<td>" . $row['ID_RUTA'] . "</td>";
                      echo "<td>" . $row['tipo_turno'] . "</td>";
                      echo "<td>" . $row['turno'] . "</td>";
                      echo "<td>" . $row['TiempoExSi'] . "</td>";
                      echo "<td>" . $row['Horario'] . "</td>";
                      echo "<td>" . $row['lunes'] . "</td>";
                      echo "<td>" . $row['martes'] . "</td>";
                      echo "<td>" . $row['miercoles'] . "</td>";
                      echo "<td>" . $row['jueves'] . "</td>";
                      echo "<td>" . $row['viernes'] . "</td>";
                      echo "<td style='background-color: red; font-weight: bold;'>" . $dias_espaniol[date_format($row['FechaSolicitud'], 'w')] . date_format($row['FechaSolicitud'], ' d/m/y') . "</td>";
                      echo "<td style='background-color: #D1D1D1;'>" . $row['Responsable'] . "</td>";
                      echo "<td> 
                    <a class='btn btn-warning' href='../Transporte/Editar/Editar.php?ID=" . $row['ID'] . "' ><i class='fa fa-edit'></i> Editar</a>
                    </td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                  <tfoot style="text-align: center;">
                    <tr>
                      <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nomina </th>
                      <th class="sorting text-center" tabindex="0" rowspan="1" colspan="1" aria-label="">Nombre</th>
                      <th class="sorting text-center" style="background-color: #8ff08a;" aria-label="">Fecha Inicio</th>
                      <th class="sorting text-center" style="background-color: #A7D8D8;" aria-label="">Fecha Fin</th>
                      <th class="sorting text-center" aria-label="">Telefono</th>
                      <th class="sorting text-center" aria-label="">Domicilio</th>
                      <th class="sorting text-center" aria-label="">Punto</th>
                      <th class="sorting text-center" aria-label="">Ruta</th>
                      <th class="sorting text-center" aria-label="">T. Turno</th>
                      <th class="sorting text-center" aria-label="">Turnos</th>
                      <th class="sorting text-center" aria-label="">T. Extra</th>
                      <th class="sorting text-center" aria-label="">Horario</th>
                      <th class="sorting text-center" aria-label="">Lunes</th>
                      <th class="sorting text-center" aria-label="">Martes</th>
                      <th class="sorting text-center" aria-label="">Miercoles</th>
                      <th class="sorting text-center" aria-label="">Jueves</th>
                      <th class="sorting text-center" aria-label="">Viernes</th>
                      <th class="sorting text-center" style="background-color: red;" aria-label="">FechaSolicitud</th>
                      <th class="sorting text-center" style="background-color: #D1D1D1;" aria-label="">Responsable</th>
                      <th class="sorting text-center" aria-label="">Edit</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </form>

</body>
</html>