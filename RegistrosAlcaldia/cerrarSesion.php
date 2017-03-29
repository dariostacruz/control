<?php

session_start();
$_SESSION['login'] = ""; //variable global de sesion creada
$_SESSION['name'] = ""; //variable global de sesion creada
session_destroy();

echo '<script languaje="JavaScript">
   alert("Sesión Finalizada");          
    </script>';
header("Location: index.php"); //redireccionar a la pagina del cliente 
?>
   
