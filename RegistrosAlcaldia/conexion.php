<?php

//conexion a base de datos
$db = "control"; //base de datos
$host = "localhost"; //direccion que va utilizar la conexion
$user = "root"; //usuario
$pw = ""; //password

$con = new  mysqli($host, $user, $pw, $db); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

if (mysqli_connect_errno()) {
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
}
?>


