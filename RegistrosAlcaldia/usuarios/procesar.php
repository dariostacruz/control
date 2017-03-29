<?php

include('../conexion.php');


$bandera = 0; //bandera para retornar valores de validacion

/* REGISTRAR USUARIOS ADMINISTRADOR */
// validar que exista y no tenga valores nulos
//UTILIZADON EL MISMO ID PARA LOS REGISTROS DE USUARIOS
if (isset($_POST['txtId']) && !empty($_POST['txtId']) &&
        isset($_POST["txtNombre"]) && !empty($_POST["txtNombre"]) &&
        isset($_POST["txtPassword"]) && !empty($_POST["txtPassword"]) &&
        isset($_POST["sregistro"]) && !empty($_POST["sregistro"])) {

    $id = intval($_POST["txtId"]); //convertir a entero
    $nombre = $_POST["txtNombre"];
    $password = md5($_POST["txtPassword"]);
    $tipo = intval($_POST["sregistro"]);

    //saber si el usuario existe
    $consulta = "select id from usuarios where id='$id'";

    //traer registros de base de datos con la conexion
    $resultado = $con->query($consulta);

    //si devolvio un registro existente
    if ($registros = $resultado->fetch_assoc()) {
        $bandera = 1; //usuario ya existe
        echo $bandera;
    } else {
        $consulta = "insert into usuarios (id, nombre, password, tipo) values ('$id','$nombre','$password','$tipo')";

        //ejecutar consulta base de datos con la conexion
        $resultado = $con->query($consulta);

        //validar consulta realizada
        if ($resultado > 0) {
            $bandera = 2; //registro exitoso
            echo $bandera;
        } else {
            $bandera = 3; //error al registrar nuevo usuario
            echo $bandera;
        }
    }

    mysqli_close($con); //cerrar conexion a bd
    unset($id);
    unset($password);
    unset($nombre);
    unset($tipo);
    unset($registros);
    unset($consulta);
    return;
}

if (isset($_POST['identificacion2']) && !empty($_POST['identificacion2'])) {

    $id = intval($_POST["identificacion2"]); //convertir a entero
//saber si el usuario existe
    $consulta = "delete from usuarios where id='$id'";

//traer registros de base de datos con la conexion
    $resultado = $con->query($consulta);

//validar consulta realizada
    if ($resultado > 0) {
        $bandera = 1; //registro exitoso
        echo $bandera;
    } else {
        $bandera;
    }
}
?>