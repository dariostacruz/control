<html>
    <head>
        <meta  charset="UTF-8"/>
        <title>index</title>

        <link href="librerias/jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet" type="text/css" />
        <link href="librerias/jquery-ui-1.11.4.custom/jquery-ui.theme.css" rel="stylesheet" type="text/css" />
        <link href="css/sesion.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="librerias/jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
        <script type="text/javascript" src="librerias/jquery-ui-1.11.4.custom/jquery-ui.js"></script>  
        <script type="text/javascript" src="js/sesion.js"></script>

        <link href="estilo.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <div id="tooplate_wrapper">
          

            <div id="tooplate_header">
                <div id="site_title1"> <br><img src="imagenes/escudonar.png" height="120" width="130"/></div>
                
                <div id="site_title">     
                <h1>REGISTRO DE ASISISTENCIA FUNCIONARIOS</h1>
                <h1>INSTITUTO COLOMBIANO DE BIENESTAR FAMILIAR</h1></div>
                <div id="site_title2"><br><img src="imagenes/COLOMBIA.png" height="120" width="130"/></div>
 
            </div>
     
             
            </div> <!-- end of forever header -->
            <div id="tooplate_menu">
                    <ul>
                        <li><input class="button red medium radius " type="button"  value="inicio" onClick="location.href = 'index.php'" ></li>
                        <li><input class="button red medium radius " type="button" id="inicio" name="btnEnviar" value="iniciar sesiòn"/></li>
                        <li><input class="button red medium radius " type="button"  value="Registro" onClick="location.href = 'control.php'" ></li>
                    </ul> 
                       
                   
                </div> <!-- end of tooplate_menu -->
   <br>
  <br>
    <br>
               
            <div id="dialog-form" title="Iniciar Sesión">

                <form name="frmSesion" id="frmSesion" action="sesion.php" method="post" >
                    <fieldset>
                       Usuario:<input  type="text" name="txtId" id="txtId" placeholder="Ingresar Login" required class="text ui-widget-content ui-corner-all">

                        Clave:<input type="password" name="txtPassword" id="txtPassword" placeholder="Ingresar Contraseña" required  class="text ui-widget-content ui-corner-all">
                        <br><hr><br>
                        <center>
                            <input type="button" id="btnInicio" name="btnInicio" value="Ingresar" >
                            <input type="button" id="btnClose" name="btnClose" value="Cancelar" >
                        </center>

                    </fieldset>  
                </form>
                <div id="resultado"></div>
            </div>

            <div id="tooplate_main"><br>
                <input class="button red medium radius " type="button" id="inicio" name="btnEnviar" value="iniciar sesiòn"/> <br><br>

                <img src="imagenes/banner.jpg" width="900" align="center">
                <div id="tooplate_content">
				
				<h2>QUIENES SOMOS</h2>
				El Instituto Colombiano de Bienestar Familiar, creado en 1968, es una entidad del estado colombiano, que trabaja por la prevención y protección integral de la primera infancia, la niñez, la adolescencia y el bienestar de las familias en Colombia.
				ICBF con sus servicios brinda atención a niños y niñas, adolescentes y familias, especialmente a aquellos en condiciones de amenaza, inobservancia o vulneración de sus derechos.
				La Entidad cuenta con 33 regionales y 206 centros zonales en todo el país, llegando a más de 8 millones de colombianos con sus servicios
                    <h2>  MISION </h2>

                    <div class="col_w900">


                     
<p>El Instituto Colombiano de Bienestar Familiar, creado en 1968,
 es una entidad del estado colombiano, que trabaja por la prevención y 
 protección integral de la primera infancia,
 la niñez, la adolescencia y el bienestar de las familias en Colombia.</p> 
  <h2>  VISION </h2>
  <br>
<p>Cambiar el mundo de las nuevas generaciones y sus familias,
 siendo referente en estándares de calidad y contribuyendo 
 a la construcción de una sociedad en paz, próspera y equitativa. 


                        <ul class="tooplate_list">
                            <h2>OBJETIVOS INSTUCIONALES</h2>
                         <li>   Ampliar cobertura y mejorar calidad en la atención integral a la primera infancia.</li>
						<li>	Promover los Derechos de los niños, niñas y adolescentes y prevenir los riesgos o amenazas de vulneración de los mismos.</li>
						<li>	Fortalecer con las familias y comunidades las capacidades para promover su desarrollo, fortalecer sus vínculos de cuidado mutuo y prevenir la violencia intrafamiliar y de género.</li>
						<li>	Promover la seguridad alimentaria y nutricional en el desarrollo de la primera infancia, los niños, niñas y adolescente y la familia.</li>
						<li>	Garantizar la protección integral de los niños, niñas y adolescentes en coordinación con las instancias del Sistema Nacional de Bienestar Familiar.</li>
						<li>	Lograr una adecuada y eficiente gestión institucional a través de la articulación entre servidores, áreas y niveles territoriales; el apoyo administrativo a los procesos misionales, la apropiación de una cultura de la evaluación y la optimización del uso de los recursos.</li>
                        </ul>
                        <div class="cleaner h30"></div>
<div id="ubicacion" align="center">
<h2>UBICACION</H2>
<iframe src="https://www.google.com/maps/d/embed?mid=z4s4aLslhnTQ.kZk0hzJYr2sM" width="640" height="480"></iframe>
</div>
<p><P>
<!--                        <div class="cleaner"></div>
                    </div>

                    <div class="col_w900 col_w900_last">

                    </div>
                    <div class="cleaner"></div>
                </div>
                <div class="col_w900 col_w900_last">-->

<!--                    <div id="site_title"><h1><a href="#">Silvana</a></h1></div>
                    <hr>
                    <div id="tooplate_footer">-->
                        

                        Nos encuentran en:  <a href="#">icbf@narino-narino.gov.co</a>
                        <br>
                        <br>
                        <b>Teléfono: (+572) 7231578 Fax:(+572) 7231578</b>
                        <br>
                        <b>Calle Principal -Corregimiento de GENOY
                            Municipio de Nariño-Nariño </b>
                    </div> <!-- end of footer -->
                </div> <!-- end of content -->

            </div> <!-- end of main -->



        </div>

    </body>
</html>
