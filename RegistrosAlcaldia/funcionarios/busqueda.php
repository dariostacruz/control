

<?php
//importar archivo de conexion
include('../conexion.php');

if (isset($_POST['txtIdBusqueda']) && !empty($_POST['txtIdBusqueda'])) {

    $id = intval($_POST["txtIdBusqueda"]); //convertir a entero
//
//consulta sql
    $consulta = "select cedula, nombre from funcionarios where cedula='$id'";

//traer registros de base de datos
    $resultado = $con->query($consulta);

    if ($registros = $resultado->fetch_assoc()) {
        ?>
        <script src="js/funcionarios.js"></script>
        <br>
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

        </tbody>
        </table>
    <?php }
 else {
     echo 'No existe ese registro';    
    }?>
<?php } ?>


