<?php
$Id_punto = $_GET['Id_punto'];

echo "<script>
        var respuesta = confirm('¿Segura de eliminar el punto $Id_punto?')
   
        if(respuesta)
          document.location='Baja.php?Id_punto=" . $Id_punto . "';  
        else{
            window.history.back();
        }
    </script>";
  
?>