<?php include_once "../BD_Conexion.php";
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




<?php include "prueba.php";  ?>

<details>
    <summary>
        <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (11)</span></strong> - SAN ANTONIO - SAN FRANCISCO DE LOS ROMO</h5>
    </summary>
    <div>Selecciona punto de abordaje: <select class="select" name="Id_punto11" id="Id_punto11" >
            <br>
            <option value="">Ninguno Seleccionado Todavia</option>
            <?php while ($row = sqlsrv_fetch_array($resultado10, SQLSRV_FETCH_ASSOC)) { ?>
                <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
            <?php }
            sqlsrv_free_stmt($resultado10); ?>
        </select>
    </div>
</details>

<details>
    <summary>
        <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (12)</span></strong> - EL AGUILA - (ZONA NORTE AGS)</h5>
    </summary>
    <div>Selecciona punto de abordaje: <select class="select" name="Id_punto12" id="Id_punto12" >
            <br>
            <option value="">Ninguno Seleccionado Todavia</option>
            <?php while ($row = sqlsrv_fetch_array($resultado11, SQLSRV_FETCH_ASSOC)) { ?>
                <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
            <?php }
            sqlsrv_free_stmt($resultado11); ?>
        </select>
    </div>
</details>
<details>
    <summary>
        <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (13)</span></strong> - RECIDENCIAL DEL PARQUE - AGS</h5>
    </summary>
    <div>Selecciona punto de abordaje: <select class="select" name="Id_punto13" id="Id_punto13">
            <br>
            <option value="">Ninguno Seleccionado Todavia</option>
            <?php while ($row = sqlsrv_fetch_array($resultado12, SQLSRV_FETCH_ASSOC)) { ?>
                <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
            <?php }
            sqlsrv_free_stmt($resultado12); ?>
        </select>
    </div>
</details>


<details>
    <summary>
        <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (14)</span></strong> - PABELLON DE ARTEAGA - (ZONA NORTE AGS)</h5>
    </summary>
    <div>Selecciona punto de abordaje: <select class="select" name="Id_punto14" id="Id_punto14">
            <br>
            <option value="">Ninguno Seleccionado Todavia</option>
            <?php while ($row = sqlsrv_fetch_array($resultado13, SQLSRV_FETCH_ASSOC)) { ?>
                <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
            <?php }
            sqlsrv_free_stmt($resultado13); ?>
        </select>
    </div>
</details>

<details>
    <summary>
        <h5 style="font-family: Arial;"><strong style="color: #001A5E;"><span>RUTA (15)</span></strong> - ASIENTOS Y CALDERA - (ZONA NORTE AGS)</h5>
    </summary>
    <div>Selecciona punto de abordaje: <select class="select" name="Id_punto15" id="Id_punto15">
            <br>
            <option value="">Ninguno Seleccionado Todavia</option>
            <?php while ($row = sqlsrv_fetch_array($resultado14, SQLSRV_FETCH_ASSOC)) { ?>
                <option value="<?php echo $row['Id_punto']; ?>"><?php echo $row['Nombre_punto']; ?></option>
            <?php }
            sqlsrv_free_stmt($resultado14); ?>
        </select>
    </div>
</details>



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