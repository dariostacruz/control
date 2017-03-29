<?php

include 'conexion.php'; //incluir clase conexion

if (isset($_POST['txtId']) && !empty($_POST['txtId']) &&
        isset($_POST['txtPassword']) && !empty($_POST['txtPassword'])) {

    session_start(); //inicio de sesion

    $login = intval($_POST['txtId']); //convertir a entero
    $password = md5($_POST['txtPassword']); //encriptar contraseña

    $i = 0;

    //consulta sql
    $consulta = "select id, nombre, password, tipo from usuarios where id='$login'";

//traer registros de base de datos con la conexion
    $resultado = $con->query($consulta);

    //si devolvio un registro existente
    if ($registros = $resultado->fetch_assoc()) {

        //sesion administrador
        if ($login == $registros['id'] && $password == $registros['password'] && $registros['tipo'] == 2) {
             $i = 2;
            echo $i; //administrador
            $_SESSION['login'] = $registros['id']; //variable global de sesion creada
            $_SESSION['name'] = $registros['nombre']; //variable global de sesion creada
        }
        //sesion cliente
        elseif ($login == $registros['id'] && $password == $registros['password'] && $registros['tipo'] == 1) {
             $i = 1;
            echo $i; //usuarios
            $_SESSION['login'] = $registros['id']; //variable global de sesion creada
            $_SESSION['name'] = $registros['nombre']; //variable global de sesion creada
        }
        else{
             $i = 3;
            echo $i; //si no existe ningun registro
        }
            
        
    } else {
        $i = 3;
        echo $i; //si no existe ningun registro
    }

    /* destruir variable */
    unset($login);
    unset($password);
   mysqli_close($con);
}
?>



