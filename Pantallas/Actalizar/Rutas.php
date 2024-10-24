<?php include_once "../../BD_Conexion.php";
?>
<!DOCTYPE html>
<html lang="en">

<style>
    #menu * {
        list-style: none;
    }

    #menu li {
        line-height: 180%;
    }

    #menu li a {
        color: #222;
        text-decoration: none;
    }

    #menu li a:before {
        content: "\025b8";
        color: #ddd;
        margin-right: 4px;
    }

    #menu input[name="list"] {
        position: absolute;
        left: -1000em;
    }

    #menu label:before {
        content: "\025b8";
        margin-right: 4px;
    }

    #menu input:checked~label:before {
        content: "\025be";
    }

    #menu .interior {
        display: none;
    }

    #menu input:checked~ul {
        display: block;
    }
</style>

<style>
    details {
        list-style: none;
    }

    details {
        background-color: rgba(197, 197, 197, 0.527), 216, 216);
        /* color de fondo cuando no está desplegado */
    }

    details[open] {
        background: rgba(197, 197, 197, 0.527), 216, 216);
        /* color de fondo cuando está desplegado */
    }

    details summary {
        font-weight: 400;
        /* peso de la tipografía cuando  no está desplegado */
        list-style: none;
        /* ocultamos la flecha */
        cursor: pointer;
        /* cambia el cursor del puntero */
    }

    details p {
        background: rgba(197, 197, 197, 0.527), 216, 216);
        /* color de fondo del contenido oculto */
    }

    details {
        position: relative;
    }

    details summary::before {
        position: absolute;
        content: "👇";
        font-size: 1.10rem;
        top: 5px;
        right: 10px;
    }


    @-webkit-keyframes rotate-emoji {
        0% {
            -webkit-transform: rotate(0);
            transform: rotate(0);
        }

        100% {
            -webkit-transform: rotate(180deg);
            transform: rotate(180deg);
        }
    }
</style>


<div class="card card-primary  py-3">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10 text-rigth">
            <table>
                <tr>
                    <td>
                        <img src="../../img/busss.jpg" alt="" width="60" height="60">
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;</td>
                    <td>
                        <h3 class="text-uppercase text-rigth" style="color: #001A5E;"><em><strong>Selecciona Punto de abordaje</strong></em></h3>
                    </td>
                </tr>
            </table>
        </div>



        <!-- ------------------------------------------------------ -->
        <?php include "prueba2.php";  ?>
        <div class="container py-3">
            <div class="row">
                <div class="col-sm-12 text-left">

                    <ul id="menu">
                        <li><input type="checkbox" name="list" id="nivel1-1">
                            <label for="nivel1-1">
                                <em style="color: red;"><strong>MOSTRAR TODAS LAS RUTAS Y PUNTOS DE ABORDAJE</strong></em>
                            </label>
                            <ul class="interior">
                                <li>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (01)</span></strong> - LOMAS DEL AJEDREZ - AGS</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto1" id="Id_punto1">
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado); ?>
                                            </select>
                                        </div>
                                    </details>

                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (02)</span></strong> - CALVILLITO - AGS (ZONA SUR AGS)</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto2" id="Id_punto2" >
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado1, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado1); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (03)</span></strong> - NORIAS DE OJOCALIENTE - AGS</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto3" id="Id_punto3">
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado2, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado2); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (04)</span></strong> - V.N.S.A. - AGS (ZONA SUR AGS)</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto4" id="Id_punto4" >
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado3, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado3); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (05)</span></strong> - 4° CENTENARIO (CENTRO, AGUASCALIENTES)</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto5" id="Id_punto5" >
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado4, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado4); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (06)</span></strong> - JESUS MARIA - AGS (ZONA SUR AGS)</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto6" id="Id_punto6" >
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado5, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado5); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (07)</span></strong> - MOSQUEIRA - PABELLÓN DE ARTEAGA - COL 28 DE ABRIL</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto7" id="Id_punto7" >
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado6, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado6); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (08)</span></strong> - COSIO - AGS (ZONA NORTE AGS)</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto8" id="Id_punto8" >
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado7, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado7); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (09)</span></strong> - PABELLÓN DE HIDALGO - SAN FCO. DE LOS ROMO</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto9" id="Id_punto9">
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado8, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado8); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <details>
                                        <summary>
                                            <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (10)</span></strong> - RINCON DE ROMOS - (ZONA NORTE AGS)</h5>
                                        </summary>
                                        <div>Selecciona punto de abordaje: <select class="select" name="Id_punto10" id="Id_punto10" >
                                                <br>
                                                <option value="">Ninguno Seleccionado Todavia</option>
                                                <?php while ($row = sqlsrv_fetch_array($resultado9, SQLSRV_FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
                                                <?php }
                                                sqlsrv_free_stmt($resultado9); ?>
                                            </select>
                                        </div>
                                    </details>
                                    <?php include_once "rutas2.php"; ?>

                                    </label>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-2"></div>
</div>
</div>

<script>
    const closeDetails = document.querySelectorAll('details');
    closeDetails.forEach(details => {
        details.addEventListener('toggle', (e) => {
            if (details.open) {
                closeDetails.forEach(details => {
                    if (details != e.target && details.open) {
                        details.open = false;
                    }
                });
            }
        });
    });
</script>
</body>

</html>