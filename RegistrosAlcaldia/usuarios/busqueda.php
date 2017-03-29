

<?php
//importar archivo de conexion
include('../conexion.php');


if (isset($_POST['txtIdBusqueda']) && !empty($_POST['txtIdBusqueda'])) {

    $id = intval($_POST["txtIdBusqueda"]); //convertir a entero
//
//consulta sql
    $consulta = "select id, nombre from usuarios where id='$id'";

//traer registros de base de datos
    $resultado = $con->query($consulta);

    if ($registros = $resultado->fetch_assoc()) {
        ?>
        <script src="js/usuarios.js"></script>
        <h3>Resultado de Busqueda</h3>
        <table border=1 width="92%">
            <thead>
                <tr>
                    <td><b>Identificación</b></td>
                    <td><b>Nombre</b></td>
                    <td><b>Editar</b></td>
                    <td><b>Eliminar</b></td>
                    <td><b>Imprimir</b></td>
                </tr>
            <tbody>
                <tr>
                    <td><?php echo $registros['id']; ?>
                    </td>
                    <td>
                        <?php echo $registros['nombre']; ?>
                    </td>
                    <td>
            <center><input type="button" identificacion1="<?php echo $registros['id']; ?>" class="editar" value="Editar" ></center>                
        </td>
        <td>
        <center><input type="button" identificacion2="<?php echo $registros['id']; ?>" class="eliminar"  value="Eliminar" ></center>
        </td>
        <td>
        <center><input type="button" identificacion3="<?php echo $registros['id']; ?>" class="imprimir"  value="Imprimir" ></center>
        </td>
        </tr>

        </tbody>
        </table>
        <div id="dialog-eliminar" title="Advertencia de Eliminación">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">   
        </span>El registro sera eliminado, esta seguro?</p>
</div>
    <?php }
 else {
     echo 'No existe ese registro';    
    }?>
<?php } ?>


