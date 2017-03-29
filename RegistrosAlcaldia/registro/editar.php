<?php

//importar archivo de conexion
include('../conexion.php');

$id = intval($_POST["identificacion1"]); //convertir a entero
//saber si el usuario existe
$consulta = "select * from registro where codigo='$id'";

//traer registros de base de datos con la conexion
$resultado = $con->query($consulta);

//convertir a vector o array
$registros = $resultado->fetch_assoc();
?>
<script src="js/registro.js"></script><br>
<h3>Datos de Registro</h3>
<form name="frmRegistro1" id="frmRegistro1" action="procesar.php" method="post" >
    <fieldset>
        Codigo: <input type="text" name="txtCodigor"  id="txtCodigor"  placeholder="Ingresar Codigo" required class="text ui-widget-content ui-corner-all"readonly value="<?php echo $registros['codigo']; ?>"  /><br>
        Cedula: <input type="text" name="txtCedular"  id="txtCedular"  placeholder="Ingresar Cedula" required class="text ui-widget-content ui-corner-all" value="<?php echo $registros['cedula']; ?>"  /><br>
        Fecha: <input type="date" name="txtFecha" id="txtFecha" placeholder="Ingresar Fecha" class="text ui-widget-content ui-corner-all" value="<?php echo $registros['fecha']; ?>" /><br>
        Hora: <input type="time" name="txthora" id="txthora" placeholder="Ingresar Hora" required class="text ui-widget-content ui-corner-all" value="<?php echo $registros['hora']; ?>" /><br>
        Jornada:
        <select name="jornada" id="jornada" class="text ui-widget-content ui-corner-all">
            <option value="0">"Seleccionar"</option>
            <option value="1">Mañana</option>
            <option value="2">Tarde</option>
        </select> <br><br>
        Ingreso:
        <select name="ingreso" id="ingreso" class="text ui-widget-content ui-corner-all">
            <option value="0">"Seleccionar"</option>
            <option value="1">Entrada</option>
            <option value="2">Salida</option>
        </select>
        <br><br><hr><br>
        <center>
            <input type="button" id="btnActualizareg" name="btnActualizareg" value="Actualizar" class="boton">
            <input type="button" id="btnClosef2" name="btnClosef2" value="Cancelar" class="boton">
        </center>
    </fieldset>  
</form>
<div id="resultado7"></div>
<?php

echo '<script >
            document.getElementById("jornada").value = "' . $registros['jornada'] . '"; </script>';
echo '<script >
            document.getElementById("ingreso").value = "' . $registros['ingreso'] . '"; </script>';
?>