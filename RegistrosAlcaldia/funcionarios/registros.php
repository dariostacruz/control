
<?php
//importar archivo de conexion
include('../conexion.php');

//consulta sql
$consulta = "select cedula, nombre from funcionarios";

//traer registros de base de datos
$resultado = $con->query($consulta);
?>

<script src="js/funcionarios.js"></script>
<h3>Funcionarios</h3>
<table border=1 width="62%">
    <thead>
        <tr>
            <td><b>Identificación</b></td>
            <td><b>Nombre</b></td>
            <td><b>Editar</b></td>
            <td><b>Eliminar</b></td>
            <td><b>Imprimir</b></td>
        </tr>
    <tbody>
        <?php
        //almacernar registros en forma de vector 
        while ($registros = $resultado->fetch_assoc()) {
            ?>
            <tr>
                <td><?php echo $registros['cedula']; ?>
                </td>
                <td>
                    <?php echo $registros['nombre']; ?>
                </td>
                <td>
        <center><input type="button" identificacion1="<?php echo $registros['cedula']; ?>" class="editarf" value="Editar" ></center>                
    </td>
    <td>
    <center><input type="button" identificacion2="<?php echo $registros['cedula']; ?>" class="eliminarf"  value="Eliminar" ></center>
    </td>
    <td>
    <center><input type="button" identificacion3="<?php echo $registros['cedula']; ?>" class="imprimirf"  value="Imprimir" ></center>
    </td>
    </tr>
<?php } ?>
</tbody>
</table>
<div id="dialog-eliminarf" title="Advertencia de Eliminación">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">   
        </span>El registro sera eliminado, esta seguro?</p>
</div>

<div id="dialog-imprimirf" title="Advertencia este archivo se va a Imprimir">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">   
        </span>El registro se va a imprimir, esta seguro?</p>
</div>
