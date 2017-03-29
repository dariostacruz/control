<?php

include('../conexion.php');
$bandera = 0; //bandera para retornar valores de validacion

/* REGISTRAR USUARIOS ADMINISTRADOR */
// validar que exista y no tenga valores nulos
//UTILIZADON EL MISMO ID PARA LOS REGISTROS DE USUARIOS

     if (   isset($_POST["txtNombref"]) && !empty($_POST["txtNombref"]) &&
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
    $consulta = "update funcionarios set nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono',email='$email' where cedula='$cedula' ";


    //ejecutar consulta actualizar datos usuario
    $resultado = $con->query($consulta);

   //validar consulta realizada
        if ($resultado > 0) {
            $bandera = 1; //registro exitoso
            echo $bandera;
        } 
        else{ $bandera;}
    

    mysqli_close($con);//cerrar conexion a bd
    unset($cedula);
    unset($nombre);
    unset($apellido);
    unset($direccion);
    unset($telefono);
    unset($email);
    return;
}
?>
