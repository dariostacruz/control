<?php

//importar archivo de conexion
include('../conexion.php');

$id = intval($_POST["identificacion1"]); //convertir a entero
//saber si el usuario existe
$consulta = "select * from funcionarios where cedula='$id'";

//traer registros de base de datos con la conexion
$resultado = $con->query($consulta);

//convertir a vector o array
$registros = $resultado->fetch_assoc();
?>
<script src="js/funcionarios.js"></script>
<h3>Datos de Funcionario</h3>
<form name="frmFuncionario2" id="frmFuncionario2" action="procesar.php" method="post" >
    <fieldset>
        Cedula: <input type="text" name="txtCedula"  id="txtCedula"  placeholder="Ingresar Cedula" required readonly value="<?php echo $registros['cedula']; ?>" /><br>
        Nombre: <input type="text" name="txtNombref" id="txtNombref" placeholder="Ingresar Nombre"value="<?php echo $registros['nombre']; ?>"/><br>
        Apellido: <input type="text" name="txtApellido" id="txtApellido" placeholder="Ingresar Apellido"value="<?php echo $registros['apellido']; ?>"/><br>
        Direccion: <input type="text" name="txtDireccion" id="txtDireccion" placeholder="Ingresar Direccion"value="<?php echo $registros['direccion']; ?>"/><br>
        Telefono: <input type="text" name="txtTelefono" id="txtTelefono" placeholder="Ingresar Telefono"value="<?php echo $registros['telefono']; ?>"/><br>
        Email: <input type="text" name="txtEmail" id="txtEmail" placeholder="Ingresar Email"value="<?php echo $registros['email']; ?>"/><br>
        <br><br><hr><br>
        <center>
            <input type="button" id="btnActualizarf" name="btnActualizarf" value="Actualizar" class="boton">
            <input type="button" id="btnClosef2" name="btnClosef2" value="Cancelar" class="boton">
        </center>
    </fieldset>  
</form>
<div id="resultado4"></div>
