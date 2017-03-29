<?php
include('../conexion.php');
$bandera = 0; //bandera para retornar valores de validacion

$valores = trim(strtoupper(($_POST["value"])));
$valores = explode("//", $valores);

//valores de llegada
$numero_id=trim($valores[0]);
$nombre=trim($valores[1]);
$clave=trim($valores[2]);
$clave=md5($clave);
$tipo_usuario=trim($valores[3]);

/* REGISTRAR USUARIOS ADMINISTRADOR */
// validar que exista y no tenga valores nulos
//UTILIZADON EL MISMO ID PARA LOS REGISTROS DE USUARIOS

if($numero_id=="" or $nombre=="" or $clave==""  or $tipo_usuario=="")
{
$bandera=5;//ERROR EN CASO DE QUE EXISTAN CAMPOS VACIOS
}
//
if($bandera==0)
{
$consulta = "select id from usuarios where id='$numero_id'";
//traer registros de base de datos con la conexion
 $resultado = $con->query($consulta);
 if ($registros = $resultado->fetch_assoc()) {
        $bandera = 3; //usuario ya existe
           } else {
        $consulta = "insert into usuarios (id, nombre, password, tipo) values ('$numero_id','$nombre','$clave','$tipo_usuario')";

        //ejecutar consulta base de datos con la conexion
        $resultado = $con->query($consulta);

        //validar consulta realizada
        if ($resultado > 0) {
            $bandera = 2; //registro exitoso
         
        } else {
            $bandera = 4; //error al registrar nuevo usuario
                   }
    }
}
//CONTROL DE ERRORES
if($bandera==2)
{
echo "EL USUARIO FUE REGISTRADO DE FORMA EXITOSA";	
}
if($bandera==4)
{
echo "ERROR DE REGISTRO...INTENTELO NUEVAMENTE";	
}
if($bandera==3)
{
echo "EL USUARIO YA EXISTE";	
}
if($bandera==5)
{
echo "EXISTEN CAMPOS VACIOS QUE DEBEN REGISTRARSE";	
}
echo $bandera;
 mysqli_close($con); //cerrar conexion a bd


?>