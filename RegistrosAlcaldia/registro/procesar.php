<?php

include('../conexion.php');


$bandera = 0; //bandera para retornar valores de validacion

/* REGISTRAR USUARIOS ADMINISTRADOR */
// validar que exista y no tenga valores nulos
//UTILIZADON EL MISMO ID PARA LOS REGISTROS DE USUARIOS
if (
//        isset($_POST['txtCodigor']) && !empty($_POST['txtCodigor']) &&
        isset($_POST['txtCedular']) && !empty($_POST['txtCedular']) &&
        isset($_POST["txtFecha"]) && !empty($_POST["txtFecha"]) &&
        isset($_POST["txthora"]) && !empty($_POST["txthora"]) &&
        isset($_POST["jornada"]) && !empty($_POST["jornada"]) &&
        isset($_POST["ingreso"]) && !empty($_POST["ingreso"])) {

//    $cod = intval($_POST["txtCodigor"]); //convertir a entero
    $id = intval($_POST["txtCedular"]); //convertir a entero
    $fecha = $_POST["txtFecha"];
    $hora = $_POST["txthora"];
    $jornada = intval($_POST["jornada"]);
 $ingreso = intval($_POST["ingreso"]);
    //saber si el usuario existe
    $consulta = "select codigo from registro where codigo='$id'";

    //traer registros de base de datos con la conexion
    $resultado = $con->query($consulta);

    //si devolvio un registro existente
    if ($registros = $resultado->fetch_assoc()) {
        $bandera = 1; //usuario ya existe
        echo $bandera;
    } else {
        $consulta = "insert into registro (cedula, fecha, hora, jornada, ingreso) values ('$id', '$fecha', '$hora', '$jornada', '$ingreso')";

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
    unset($fecha);
    unset($hora);
    unset($jornada);
    unset($ingreso);
    unset($registros);
    unset($consulta);
    return;
}

if (isset($_POST['identificacion2']) && !empty($_POST['identificacion2'])) {

    $id = intval($_POST["identificacion2"]); //convertir a entero
//saber si el usuario existe
    $consulta = "delete from registro where codigo='$id'";

//traer registros de base de datos con la conexion
    $resultado = $con->query($consulta);

//validar consulta realizada
    if ($resultado > 0) {
        $bandera = 1; //registro exitoso
        echo $bandera;
    } else {
       echo $bandera;
    }
}
?>