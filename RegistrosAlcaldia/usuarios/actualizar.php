<?php

include('../conexion.php');


$bandera = 0; //bandera para retornar valores de validacion

/* REGISTRAR USUARIOS ADMINISTRADOR */
// validar que exista y no tenga valores nulos
//UTILIZADON EL MISMO ID PARA LOS REGISTROS DE USUARIOS
if (isset($_POST['txtIdUsu']) && !empty($_POST['txtIdUsu']) &&
        isset($_POST["txtNombreUsu"]) && !empty($_POST["txtNombreUsu"]) &&
        isset($_POST["txtPasswordUsu"]) && !empty($_POST["txtPasswordUsu"]) &&
        isset($_POST["sregistroUsu"]) && !empty($_POST["sregistroUsu"])) {

    $id = intval($_POST["txtIdUsu"]); //convertir a entero
    $nombre = $_POST["txtNombreUsu"];
    $password = md5($_POST["txtPasswordUsu"]);
    $tipo = intval($_POST["sregistroUsu"]);

    //saber si el usuario existe
    $consulta = "update usuarios set nombre='$nombre', password='$password', tipo='$tipo' where id='$id' ";


    //ejecutar consulta actualizar datos usuario
    $resultado = $con->query($consulta);

   //validar consulta realizada
        if ($resultado > 0) {
            $bandera = 1; //registro exitoso
            echo $bandera;
        } 
        else{ $bandera;}
    

    mysqli_close($con);//cerrar conexion a bd
    unset($id);
    unset($password);
    unset($nombre);
    unset($tipo);
    unset($registros);
    unset($consulta);
    return;
}
?>
