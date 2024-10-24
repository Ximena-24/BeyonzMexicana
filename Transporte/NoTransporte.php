<?php include_once "../BD_Conexion.php";
include "consulta.php";
if (!isset($login)) {
  session_start();
  $User = $_SESSION['User'];
  $Usuario = $_SESSION['UserName'];
  $Tipo = $_SESSION['Tipo'];

  if (!isset($User)) {
    header("location:/SistemaTansporte/logout.php");
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="Beyonz Mexicana" name="" />
  <title>Personal No Transporte</title>
  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
  <!-- Styles CSS -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- Imagen principal Favicon -->
  <link href="../img/trans.png" rel="icon" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
  body {
    margin: 0;
    background: url('../img/Beyonz.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    background-size: cover;
    color: #0a0a0b;
  }
</style>

<body class="hold-transition sidebar-collapse">
  <!-- Topbar Start -->
  <div class="">
    <div class="container">
      <div class="row">
        <div class="col-12"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-2 text-center py-2" style="color: #00043D;"></div>
      <div class="col-8 py-1">
        <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
          <a href="" class="navbar-brand">
            <h1 class="m-0 text-primary"><strong>B</strong><span class="text-dark"><strong>EYONZ</strong></span></h1>
          </a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
            <div class="navbar ml-auto py-0">
              <a class="btn btn-dark" type="button" onclick="history.back()" name="volver atrás" value="Anterior" class="btn btn-primary btn-sm"><i class="fa fa-undo"></i> Regresar</a>
              &nbsp;
              <a href="botones.php" class="btn btn-primary"><i class="fa fa-home"></i> Inicio</a>
              &nbsp;
              <a href="../logout.php" class="btn btn-danger" title="Cerrar Sesion"><i class="fas fa-sign-out-alt"></i>Salir</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!-- Topbar End -->

  <div class="container py-2">
    <div class="row">
      <div class="col-6"></div>
      <div class="col-3 text-right">
        <h5 style="color: #101010;">Bienvenid@ al Sistema:</h5>
      </div>
      <div class="col-3 text-left py-1">
        <?php $Usuario = $_SESSION['UserName'];
        echo "<h3 class='nav-link' style='color: #005117;'><i class='nav-icon fa fa-users'></i>" . " " . $Usuario . "</h3>"; ?>
      </div>
    </div>
  </div>

  <form class="formulario" action="NoTransporte.php" method="post" autocomplete="off" enctype="multipart/form-data">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header container-fluid">
                <div class="row">
                  <h4 style="color: blue;"><i class='fa fa-bus'></i> PERSONAL NO UTILIZA TRANSPORTE</h4>
                </div>
              </div>

              <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped display nowrap" style="width:100%">
                  <thead style="text-align: center;">
                    <tr>
                      <th class="sorting text-center">Nomina</th>
                      <th class="sorting text-center">Nombre</th>
                      <th class="sorting text-center">Nombre Ruta</th>
                      <th class="sorting text-center">Ruta</th>
                      <th class="sorting text-center">Editar</th>
                    </tr>
                  </thead>

                  <tbody style="text-align: center;">
                    <?php
                  $query = "SELECT empleado.id_usuario,empleado.usuario,empleado.puesto,empleado.area,SM_AltaFinanzas.AF_Domicilio,
                      PuntosAbordaje.Nombre_punto,PuntosAbordaje.Numero_ruta
                      FROM empleado full join SM_AltaFinanzas on empleado.id_usuario = SM_AltaFinanzas.AF_NN 
                      full join PersonalTransporte on PersonalTransporte.ID = empleado.id_usuario
                      full join PuntosAbordaje on PuntosAbordaje.Id_punto = PersonalTransporte.Id_punto
                      WHERE SM_AltaFinanzas.AF_Domicilio IS NULL and empleado.estatus = 1 ORDER BY empleado.id_usuario asc";

                    $result = sqlsrv_query($conn, $query);

                    while ($fila = sqlsrv_fetch_array($result)) {
                      echo "<tr>";
                      echo "<td>" . $fila['id_usuario'] . "</td>";
                      echo "<td>" . $fila['usuario'] . "</td>";
                      echo "<td>" . $fila['Nombre_punto'] . "</td>";
                      echo "<td>" . $fila['Numero_ruta'] . "</td>";
                      echo "<td> 
                        <a class='btn btn-primary' href='../Agregar/Agregar.php?NN=" . $fila['id_usuario'] . "' ><i class='fa fa-edit'></i> Agregar</a>
                         </td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                  <tfoot style="text-align: center;">
                    <tr>
                      <th class="sorting text-center">Nomina</th>
                      <th class="sorting text-center">Nombre</th>
                      <th class="sorting text-center">Nombre Ruta</th>
                      <th class="sorting text-center">Ruta</th>
                      <th class="sorting text-center">Editar</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
  </form>


  <!-- footer section start -->
  <div class="contai mt-3">
    <div class="row">
      <div class="col-md-12 text-center">
        <!-- footer section starts  -->
        <section class="container-fluid text-white-50 py-5 px-sm-3 px-lg-5" style="background-color: rgba(213, 212, 212, 0.466)">
          <div class="box">
            <h1 class="text-uppercase text-center" style="color: #001571;"><em><strong>
                  <img src="../img/IconoPrincipal.png" alt="#" width="50" height="45" />
                  Sistema de Transporte</strong></em></h1>
            <hr>
            <div class="credit" style="color: rgb(1, 1, 94);">
              &copy; BEYONZ <span> MEXICANA. 2023 </span>
            </div>
          </div>
        </section>
        <!-- footer section End  -->
      </div>
    </div>
  </div>
  <!-- footer section End -->

  <!-- Topbar Start -->
  <div class="container-fluid bg-light pt-3 d-none d-lg-block">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
          <div class="d-inline-flex align-items-center">
            <p><i class="fa fa-envelope mr-2"></i>Sistemas@beyonz.com.mx</p>
            <p class="text-body px-3">|</p>
            <p><i class="fa fa-phone-alt mr-2"></i>Ext. #606,#620</p>
          </div>
        </div>
        <div class="col-lg-6 text-center text-lg-right">
          <div class="d-inline-flex align-items-center">
            <a class="text-primary px-3" href="">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="text-primary px-3" href="">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="text-primary px-3" href="">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="text-primary px-3" href="">
              <i class="fab fa-instagram"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <!-- Template Javascript -->

  <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#myTable").DataTable({
        dom: 'Bfrtip',
        "searching": true,
        "searching": true,
        "responsive": false,
        "lengthChange": false,
        "autoWidth": false,
        "paging": true,
        scrollY: false,
        scrollX: true,
        scrollCollapse: false,
        buttons: [{
            //Botón para Excel
            extend: 'excel',
            footer: true,
            title: 'PERSONAL NO UTILIZA TRANSPORTE',
            filename: 'PERSONAL NO UTILIZA TRANSPORTE',
            text: '<button class="btn btn-dark">Exportar a Excel <i class="fas fa-file-excel"></i></button>'
          }
        ]
      });
    });
    $(document).ready(function() {
      $("#myTable2").DataTable({});
    });
  </script>
</body>

</html>