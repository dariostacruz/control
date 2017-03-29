<?php

include('../conexion.php');

$bandera = 0; //bandera para retornar valores de validacion

/* REGISTRAR USUARIOS ADMINISTRADOR */
// validar que exista y no tenga valores nulos
//UTILIZADON EL MISMO ID PARA LOS REGISTROS DE USUARIOS
if (isset($_POST['txtCedula']) && !empty($_POST['txtCedula']) &&
        isset($_POST["txtNombref"]) && !empty($_POST["txtNombref"]) &&
        isset($_POST["txtApellido"]) && !empty($_POST["txtApellido"]) &&
         isset($_POST["txtDireccion"]) && !empty($_POST["txtDireccion"]) &&
        isset($_POST["txtTelefono"]) && !empty($_POST["txtTelefono"]) &&
    isset($_POST["txtEmail"]) && !empty($_POST["txtEmail"])) {


    $cedula = intval($_POST["txtCedula"]); //convertir a entero
    $nombre = $_POST["txtNombref"];
    $apellido = $_POST["txtApellido"];
    $direccion = $_POST["txtDireccion"];
    $telefono = $_POST["txtTelefono"];
    $email = $_POST["txtEmail"];

    //saber si el usuario existe
    $consulta = "select cedula from funcionarios where cedula='$cedula'";

    //traer registros de base de datos con la conexion
    $resultado = $con->query($consulta);

    //si devolvio un registro existente
    if ($registros = $resultado->fetch_assoc()) {
        $bandera = 1; //usuario ya existe
        echo $bandera;
    } else {
        $consulta = "insert into funcionarios (cedula, nombre, apellido,direccion, telefono,email) values ('$cedula','$nombre','$apellido','$direccion','$telefono','$email')";

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
    unset($cedula);
    unset($nombre);
    unset($apellido);
    unset($direccion);
    unset($telfono);
    unset($email);
    return;
}

if (isset($_POST['identificacion2']) && !empty($_POST['identificacion2'])) {

    $id = intval($_POST["identificacion2"]); //convertir a entero
//saber si el usuario existe
    $consulta = "delete from funcionarios where cedula='$id'";

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