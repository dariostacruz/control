<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>REGISTRO DE ASISTENCIA A FUNCIONARIOS</title>

        <link href="librerias/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="librerias/jquery-ui-1.11.4.custom/jquery-ui.theme.css" rel="stylesheet" type="text/css" />

        <!--<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>-->
        <script type="text/javascript" src="librerias/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script type="text/javascript" src="librerias/jquery-ui-1.11.4.custom/jquery-ui.js"></script>  
        <script type="text/javascript" src="js/control.js"></script>

        <link href="estilo.css" rel="stylesheet" type="text/css" />
    </head>
     <body>

        <div id="tooplate_wrapper">
            
            
             <div id="tooplate_header1">
                 
                <div id="site_title"><h1><a href="#">Gabriela</a></h1></div>

                <div id="tooplate_menu">
                    
                    <ul>
                        <li><a href="index.php" >INICIO</a></li>
<!--                        <li><a href="sistema.php">SISTEMA</a></li>-->
                        <li><a href="control.php" >REGISTROS</a></li>
                    </ul>        
                </div> <!-- end of tooplate_menu -->
            </div> <!-- end of forever header -->
            <br>
              <br>
                <br>
                  <br>
                    <br>
            <div id="tooplate_main">

                <div id="tooplate_content">

                    <div class="col_w900">
                       
  <div id="body">
      
                <div id="centro"> <br>
<!--                    <h1>REGISTRO DE ASISISTENCIA FUNCIONARIOS </h1>
            <h1>ALCALDIA MUNICIPAL DE NARIÑO NARIÑO </h1>-->
<div class="cuadro">
                <tr> <th> <a href="index.php" ><img src="imagenes/escudonar.png" align="left" height="100" width="105"></a></th> 
                <tr> <th><img src="imagenes/e.png" align="right" height="100" width="100"></th> 
                <h1> ICBF sede Genoy
                          <br>
                      NARIÑO-NARIÑO</h1>
                <h1> Control de asistencia</h1>
                
               
            </div> <br>

            <br> <div class="cuadro">
                    <form class="formulario" name="frmControl" id="frmControl" method="post" >
                         <br>
                        Registrarse: <input type="text" name="txtCedula"  id="txtCedula"  placeholder="Ingresar Codigo" value="" size=20 /> <br>
                         <br>
<!--                         <input type="radio" name="radtipo" value="1">JORNADA DE LA MAÑANA<br>
                            <input type="radio" name="radtipo" value="2">JORNADA DE LA TARDE<br>-->
<!--                            <br>
                            <br>-->
                    <input class="button red medium radius " type="button" id="enviar_post" name="btnEnviar" value="OK"/>
                    </form>  
                </div>
                </div>
           
            </div>

                        <div class="cleaner h30"></div>

                  
                       
                        <div class="cleaner"></div>
                    </div>

                    <div class="col_w900 col_w900_last">
                        <div class="con_tit_02">ultimas Noticias</div>

                        <div class="col_allw280 lp_box">
                            <a href="http://www.icbf.gov.co/portal/page/portal/PortalICBF" target="_blank"><img src="imagenes/b.jpg" alt="Image b" /></a>
                            <p>Ultimos Proyectos Y noticias </p>
                            <a class="more" href="#"></a>
                        </div>
                        <div class="cleaner"></div>
                    </div>
                    
                    <hr>
                    <div id="tooplate_footer">
                Nos encuentran en:  <a href="#">contacto@narino.gov.co</a>
            </div> <!-- end of footer -->

                </div> <!-- end of content -->

            </div> <!-- end of main -->

        </div>

    </body>
</html>
