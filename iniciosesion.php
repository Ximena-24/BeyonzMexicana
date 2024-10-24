<!DOCTYPE html>
<?php
include_once "Conexion.php";

if ($conn) {
  //echo "Connection established.<br />";
} else {
  echo ("<script>(alert('Connection could not be established.'))
                </script>");
  //die( print_r( sqlsrv_errors(), true));
}
?>
<html lang="es">

<head>
  <title>Login|Transporte</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="Shortcut Icon" type="image/x-icon" href="img/logo.png" />
  <script src="js2/sweet-alert.min.js"></script>
  <link rel="stylesheet" href="css2/sweet-alert.css">
  <link rel="stylesheet" href="css2/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="css2/normalize.css">
  <link rel="stylesheet" href="css2/bootstrap.min.css">
  <link rel="stylesheet" href="css2/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="css2/style.css">
  <link rel="stylesheet" href="css2/login.css" />
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script>
    window.jQuery || document.write('<script src="js/jquery-1.11.2.min.js"><\/script>')
  </script>
  <script src="js/modernizr.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/main.js"></script>

</head>


<body class="full-cover-background" style=" background-color: rgba(126, 124, 124, 0.068);">
  <br>
  <div class="form-container" style="background-color: #D8DCDC;">
    <div class="card">
      <div class="text-center">
        <img class="text-center" src="img/LOGO_beyonz.png" alt="" width="250" height="110">
        <div class="info"><a href="https://www.grandvincent-marion.fr" target="_blank">
          </a></div>
        <h3 class="text-center">Inicia sesión con tu cuenta</h3>
        <h5 class="text-center" style="color: darkblue;">Sistema de Transporte</h5>
        <img src="img/trans.png" alt="" width="50" height="50">

      </div>
      <div class="card-body login-card-body">
        <form action="Login/Validar.php" method="post">
          <div class="">
            <select type="text" class="form-control" id="Usua_Log" name="Usua_Log">
              <option value="" hidden><strong>Nombre de Usuario</strong></option>
              <?php
              $consulta = "SELECT * FROM SR_Usuarios WHERE Tipo <> 'ADMINISTRACION' ORDER BY Nombre ASC";
              $ejecutar = sqlsrv_query($conn, $consulta);
              while ($fila = sqlsrv_fetch_array($ejecutar)) {
                var_dump($fila);
                echo '<option value="' . $fila['NNomina'] . '">' . $fila['Nombre'] . '</option>';
              }
              ?>
            </select>
            <br>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-alt"></span>
              </div>
            </div>
          </div>
          <div class="">
            <input type="Password" class="form-control" placeholder="Contraseña" name="Pass_Log" id="Pass_Log">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>

          </div>
          <br>
          <center><button type="submit" name="" value="Guardar" class="btn btn-success">Ingresar al sistema &nbsp; <i class="zmdi zmdi-arrow-right"></i></button></center>
        </form>
      </div><br>
    </div>
    <br>
  </div><br>

  <script>
    import {
      Animate,
      Ripple,
      initMDB
    } from "mdb-ui-kit";

    initMDB({
      Ripple
    });
    const changeAnimationEl = document.getElementById('change-animation-type-example');
    const changeAnimationBtn = document.getElementById('change-animation-type-btn');
    let animation = 'zoom-in';
    const changeAnimation = new Animate(changeAnimationEl, {
      animation: animation,
      animationStart: 'onLoad',
      animationDuration: 1000,
      animationRepeat: true,
    });

    changeAnimation.init();

    changeAnimationBtn.addEventListener('click', () => {
      if (animation === 'zoom-in') {
        animation = 'zoom-out'
      } else {
        animation = 'zoom-in'
      }
      changeAnimation.stopAnimation();
      changeAnimation.changeAnimationType(animation);
      changeAnimation.startAnimation();
    });
  </script>
</body>
</html>