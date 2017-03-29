<?php
//importar archivo de conexion
include('../conexion.php');


$id = intval($_POST["identificacion1"]); //convertir a entero
//saber si el usuario existe
$consulta = "select * from usuarios where id='$id'";

//traer registros de base de datos con la conexion
$resultado = $con->query($consulta);

//convertir a vector o array
$registros = $resultado->fetch_assoc();
?>
<script src="js/usuarios.js"></script>
<h3>Datos de Usuario</h3>
<form name="frmUsuarioUsu" id="frmUsuarioUsu" action="procesar.php" method="post" >
    <fieldset>
        Identificación: <input type="text" name="txtIdUsu"  id="txtIdUsu"  placeholder="Ingresar Identificación" readonly value="<?php echo $registros['id']; ?>" /><br>
        Nombre: <input type="text" name="txtNombreUsu" id="txtNombreUsu" placeholder="Ingresar Nombre" value="<?php echo $registros['nombre']; ?>"/><br>
        Contraseña: <input type="password" name="txtPasswordUsu" id="txtPasswordUsu" placeholder="Ingresar Contraseña" required value=""/><br>
        Tipo Usuario:
        <select name="sregistroUsu" id="sregistroUsu" class="text ui-widget-content ui-corner-all">
            <option value="0">"Seleccionar"</option>
            <option value="1">Cliente</option>
            <option value="2">Administrador</option>
        </select>
        <br><br><hr><br>
        <center>
            <input type="button" id="btnActualizar" name="btnActualizar" value="Actualizar" class="boton">
            <input type="button" id="btnClose2" name="btnClose" value="Cancelar" class="boton">
        </center>
    </fieldset>  
</form>
<div id="resultado2"></div>
<?php
echo '<script >
            document.getElementById("sregistroUsu").value = "' . $registros['tipo'] . '"; </script>';
?>