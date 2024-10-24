<?php
$ID_RUTA = $_GET['ID_RUTA'];

echo "<script>
        var respuesta = confirm('¿Segura de eliminar la Ruta $ID_RUTA?')
   
        if(respuesta)
          document.location='BajaRuta.php?ID_RUTA=" . $ID_RUTA . "';  
        else{
            window.history.back();
        }
    </script>";
  
?>