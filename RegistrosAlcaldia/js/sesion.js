
$(document).ready(function () {

//mostrar ventana inicio de sesion ventana de dialogo jquery
$(function() {
    var dialog, form,
 
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      name = $( "#name" ),
      email = $( "#email" ),
      password = $( "#password" ),
      allFields = $( [] ).add( name ).add( email ).add( password ),
      tips = $( ".validateTips" );   
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
    });
 
    //mostrar ventana de inicio de sesion
    $( "#inicio" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
    //click boton cancelar ventana de inicio de sesion
        $("#btnClose").button().on("click", function () {
            dialog.dialog("close");
        });
  });//fin ventana de inicio de sesión
    
  //diseño de botonees con jquery
  $(function() {
    $( "input[type=submit], input[type=button], button" )
      .button()
      .click(function( event ) {
        event.preventDefault();
      });
  });
  
 //funcion para acordion
 
  $(function() {
    $( "#accordion" ).accordion();
  });
  
 /// funcion para tabs del sistema
 $(function() {
    $( "#tabs" ).tabs();
  });
  
/// funcion para tabs2 del sistema para resultados ajax
 $(function() {
    $( "#tabs2" ).tabs();
  });  
   
//ajax para iniciar sesion usuarios administradores
    $("#btnInicio").click(function () {//para hacer click
        var verificar = true;

        // alert("Hola mundo");

        //validar usuario
        if (!document.frmSesion.txtId.value)
        {
            alert("Ingresar Login");
            document.frmSesion.txtId.focus();
            verificar = false;
        }
        //validar contraseña
        else if (!document.frmSesion.txtPassword.value)
        {
            alert("Ingresar Contraseña");
            document.frmSesion.txtPassword.focus();
            verificar = false;
        }

        if (verificar === true) {

            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmSesion").serialize(),
                //archivo servidor que recive
                url: "sesion.php",
                //tipo de envio de datos
                type: "post",
                //funcion mientras procesa
                beforeSend: function () {
                    $("#resultado").html("<h3>Procesando Informacion</h3>");
                },
                //respuesta del servidor
                success: function (respuesta) {
                   // alert(respuesta);
                    // $("#resultado").html(respuesta);
                    var i = parseInt($.trim(respuesta));

                    if (i === 3) {//validacion de conexion
                        $("#resultado").html("<h3>Datos Incorrectos</h3>");
                        $("input[type=text]").val("");//limpiar casillas
                        $("input[type=password]").val("");//limpiar casillas
                    }
                    else if (i === 1) {//para cliente
                        //redirecionar a una pagina
                        location.href = "usuarios.php";
                    }
                    else if (i === 2) {
                        //redirecionar a una pagina
                        location.href = "sistema.php"; 
                    }
                    else {
                        $("#resultado").html("<h3>Error Conexion</h3>");
                        $("input[type=text]").val("");//limpiar casillas
                        $("input[type=password]").val("");//limpiar casillas    
                    }
                }
            });//fin ajax

        }//fin validar campos llenos

    });//fin hacer click 

});//finx todo el documento




