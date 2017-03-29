<?php

include('../conexion.php');

$bandera = 0; //bandera para retornar valores de validacion

/* REGISTRAR USUARIOS ADMINISTRADOR */
// validar que exista y no tenga valores nulos
//UTILIZADON EL MISMO ID PARA LOS REGISTROS DE USUARIOS
if (isset($_POST["txtCedular"]) && !empty($_POST["txtCedular"]) &&
        isset($_POST["txtFecha"]) && !empty($_POST["txtFecha"]) &&
        isset($_POST["txthora"]) && !empty($_POST["txthora"]) &&
        isset($_POST["jornada"]) && !empty($_POST["jornada"]) &&
        isset($_POST["ingreso"]) && !empty($_POST["ingreso"])) {

  $cod=intval($_POST["txtCodigor"]); //convertir a entero
    $id = intval($_POST["txtCedular"]); //convertir a entero
    $fecha = $_POST["txtFecha"];
    $hora = $_POST["txthora"];
    $jornada = intval($_POST["jornada"]);
    $ingreso = intval($_POST["ingreso"]);

    //saber si el usuario existe
    $consulta = "update registro set cedula='$id', fecha='$fecha', hora='$hora', jornada='$jornada', ingreso='$ingreso' where codigo='$cod' ";


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
    unset($fecha);
    unset($hora);
    unset($jornada);
     unset($ingreso);
    unset($registros);
    unset($consulta);
    return;
}
?>
