<?php
//importar archivo de conexion
//include('C:\xampp\htdocs\SistemaDOM\conexion.php');
include('../conexion.php');
?>
<script src="js/usuarios.js"></script>
<h3>Realizar Busqueda</h3>
<form name="frmUsuarioBuscar" id="frmUsuarioBuscar"  method="post" >
Ingresar Identificación: <input type="text" name="txtIdBusqueda"  id="txtIdBusqueda"  placeholder="Ingresar Identificación" required /><br>
<input type="button" id="btnBuscarUsu" name="btnBuscarUsu" value="Buscar" class="boton">
<div id="resultado2"></div>
</form>