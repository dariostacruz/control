
<?php
include 'conexion.php'; //incluir clase conexion
session_start(); //solo iniciando sesion
//si existe la condicion sus valores si no coloca null
$usu = isset($_SESSION['login']) ? $_SESSION['login'] : null;
$name = isset($_SESSION['name']) ? $_SESSION['name'] : null;

$consulta = "select id, nombre, password, tipo from usuarios where id='$usu'";
//traer registro
$resultado = $con->query($consulta);
//pasar vector
$registros = $resultado->fetch_assoc();

if (isset($usu) && $registros['tipo'] == 2) {// validar sesion y que sea administrador
    ?>

    <html>
        <head>
            <meta  charset="UTF-8"/>
            <title>REGISTRO DE ASISTENCIA FUNCIONARIOS ALCALDIA DE NARIÑO</title>

            <link href="librerias/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
            <link href="librerias/jquery-ui-1.11.4.custom/jquery-ui.theme.css" rel="stylesheet" type="text/css" />
            <link href="css/sesion.css" rel="stylesheet" type="text/css" />

            <script type="text/javascript" src="librerias/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
            <script type="text/javascript" src="librerias/jquery-ui-1.11.4.custom/jquery-ui.js"></script>  
            <script type="text/javascript" src="js/sesion.js"></script>
            <script type="text/javascript" src="js/sistema.js"></script>


            <link href="estilo.css" rel="stylesheet" type="text/css" />
            <link href="css/acordion.css" rel="stylesheet" type="text/css" />

        </head>

        <body>

            <div id="tooplate_wrapper">
               
                <div id="tooplate_header">
                    <div id="site_title1"> <br><img src="imagenes/escudonar.png" height="120" width="130"/></div>
                
                <div id="site_title">     
                <h1>REGISTRO DE ASISISTENCIA FUNCIONARIOS</h1>
                <h1>CORREGIMIENTO DE GENOY</h1></div>
                <div id="site_title2"><br><img src="imagenes/COLOMBIA.png" height="120" width="130"/></div>
 
            </div>
     

<!--                    <div id="site_title"><h1><a href="#">Silvana</a></h1></div>-->

                    <div id="tooplate_menu">

                        <ul>
                            <li><a href="index.php" >INICIO</a></li>
                            <li><a href="sistema.php">SISTEMA</a></li>

                        </ul>        
                    </div> <!-- end of tooplate_menu -->
                </div> <!-- end of forever header -->

                <div id="tooplate_main">
                     <a id="cerrar" href='cerrarSesion.php' >Cerrar Sesión</a>
                     <div id="usuario">Usuario: <?php echo $_SESSION['name']; ?>  </div> 
                    <div id="tooplate_content">



                        <br>

                        <div id="accordion">
                            <h3>Usuario</h3>
                            <div>
                                <center><input type="button" id="btnNuevo" name="btnNuevo" value="Nuevo" ></center>
                                <center><input type="button" id="btnListar" name="btnListar" value="Listar" ></center>
                                <center><input type="button" id="btnBuscar" name="btnBuscar" value="Buscar" ></center>
                                <center><input type="button" id="btnReporte" name="btnReporte" value="Reporte" onClick="reporte_usua()" ></center>

                            </div>
                            <h3>funcionarios</h3>
                            <div>
                                <center><input type="button" id="btnNuevo2" name="btnNuevo2" value="Nuevo" ></center>
                                <center><input type="button" id="btnListar2" name="btnListar2" value="Listar" ></center>
                                <center><input type="button" id="btnBuscar2" name="btnBuscar2" value="Buscar" ></center>
                                <center><input type="button" id="btnReporte2" name="btnReporte2" value="Reporte" ></center>

                            </div>
                            <h3>Control</h3>
                            <div>
                                <center><input type="button" id="btnNuevo3" name="btnNuevo3" value="Nuevo" ></center>
                                <center><input type="button" id="btnListar3" name="btnListar3" value="Listar" ></center>
                                <center><input type="button" id="btnBuscar3" name="btnBuscar3" value="Buscar" ></center>
                                <center><input type="button" id="btnReporte3" name="btnReporte3" value="Reporte" ></center>

                            </div>

                        </div>
                    </div>
                    <div id="tabs">
                        <ul>
                            <li><a></a></li>
                        </ul>
                        <div id="tabs-1">
                            <img src="imagenes/fondos.jpg" width="600" height="300" >
                        </div>

                    </div>
                    <div id="tabs2">
                        <ul>
                            <li><a></a></li>
                        </ul>
                        <div id="tabs2-1">         </div>
                    </div>


                    <div id="tooplate_footer">
                        Nos encuentran en:  <a href="#">contacto@narino.gov.co</a>

                    </div> <!-- end of footer -->

                </div> <!-- end of main -->

            </div>

            <!-- VENTANAS DE DIALOGO EMERGENTES PARA FORMULARIOS -->    

            <!-- VENTANAS DE DIALOGO EMERGENTES REGISTRAR USUARIOS -->

            <div id="dialogo2" title="Registrar Usuario">
           <!--
                <form name="frmUsuario" id="frmUsuario" action="procesar.php" method="post" >
            -->     <form name="frmUsuario" id="frmUsuario" action="" method="post" >
                    <fieldset>
                        Identificación: <input type="text" name="txtId"  id="txtId"  placeholder="Ingresar Identificación" required class="text ui-widget-content ui-corner-all" /><br>
                        Nombre: <input type="text" name="txtNombre" id="txtNombre" placeholder="Ingresar Nombre" class="text ui-widget-content ui-corner-all"/><br>
                        Contraseña: <input type="password" name="txtPassword" id="txtPassword" placeholder="Ingresar Contraseña" required class="text ui-widget-content ui-corner-all"/><br>
                        Tipo Usuario:
                        <select name="sregistro" id="sregistro" class="text ui-widget-content ui-corner-all">
                            <option value="0">"Seleccionar"</option>
                            <option value="1">Cliente</option>
                            <option value="2">Administrador</option>
                        </select>
                        <br><br><hr><br>
                        <center>
                            <input type="button" id="enviar_usuario" name="enviar_usuario" value="Registrar usuario" onClick="Registrar_usuario()" >
                            <input type="button" id="btnClose" name="btnClose" value="Cancelar" >
                        </center>
                    </fieldset>  
                </form>
                <div id="resultado2"></div>
            </div>
            <!-- VENTANAS DE DIALOGO EMERGENTES REGISTRAR FUNCIONARIOS -->    
            <div id="dialogo3" title="Registrar Funcionarios">
                <form name="frmFuncionario" id="frmFuncionario" action="procesar.php" method="post" >
                    <fieldset>
                        Cedula: <input type="text" name="txtCedula"  id="txtCedula"  placeholder="Ingresar Cedula" required class="text ui-widget-content ui-corner-all" /><br>
                        Nombre: <input type="text" name="txtNombref" id="txtNombref" placeholder="Ingresar Nombre" class="text ui-widget-content ui-corner-all"/><br>
                        Apellido: <input type="text" name="txtApellido" id="txtApellido" placeholder="Ingresar Apellido" required class="text ui-widget-content ui-corner-all"/><br>
                        Direccion: <input type="text" name="txtDireccion" id="txtDireccion" placeholder="Ingresar Direccion" required class="text ui-widget-content ui-corner-all"/><br>
                        Telefono: <input type="text" name="txtTelefono" id="txtTelefono" placeholder="Ingresar Telefono" required class="text ui-widget-content ui-corner-all"/><br>
                        Email: <input type="text" name="txtEmail" id="txtEmail" placeholder="Ingresar Email" required class="text ui-widget-content ui-corner-all"/><br>

                        <br><br><hr><br>
                        <center>
                            <input type="button" id="enviar_funcionario" name="enviar_funcionario" value="Registrar" >
                            <input type="button" id="btnClose2" name="btnClose2" value="Cancelar" >
                        </center>
                    </fieldset>  
                </form>
                <div id="resultado3"></div>
            </div>
             <!-- VENTANAS DE DIALOGO EMERGENTES REGISTRAR CONTROL -->    
            <div id="dialogo4" title="Registrar Control de Asistencias">
                <form name="frmRegistro" id="frmRegistro" action="procesar.php" method="post" >
                    <fieldset>
                        
                        Cedula: <input type="text" name="txtCedular"  id="txtCedular"  placeholder="Ingresar Cedula" required class="text ui-widget-content ui-corner-all" /><br>
                        Fecha: <input type="date" name="txtFecha" id="txtFecha" placeholder="Ingresar Fecha" class="text ui-widget-content ui-corner-all"/><br>
                        Hora: <input type="time" name="txthora" id="txthora" placeholder="Ingresar Hora" required class="text ui-widget-content ui-corner-all"/><br>
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
                            <input type="button" id="enviar_registro" name="enviar_registro" value="Registrar" >
                            <input type="button" id="btnClose3" name="btnClose3" value="Cancelar" >
                        </center>
                    </fieldset>  
                </form>
                <div id="resultado7"></div>
            </div>
            <div id="dialog-Reporte" title="Advertencia de Reporte">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">   
                    </span>El registro sera imprimido, esta seguro?</p>
            </div>
             <div id="dialog-Reporte2" title="Advertencia de Reporte">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">   
                    </span>El registro sera imprimido, esta seguro?</p>
            </div>
             <div id="dialog-Reporte3" title="Advertencia de Reporte">
                <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">   
                    </span>El registro sera imprimido, esta seguro?</p>
            </div>
        </body>
    </html>


    <?php
} else {
    $_SESSION['login'] = "";
    session_destroy();
    unset($usu);
    unset($resultado);
    unset($registros);
    echo "<h2><a href='index.php' > Iniciar Sesión</a></h2>";
}
mysqli_close($con); //cerrar conexion a bd
?> 