
$(document).ready(function () {



///boton para modificar datos usuario
    $(".editarf").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion1");
        $.ajax({
            url: 'funcionarios/editar.php',
            type: 'POST',
            data: {'identificacion1': valor},
            beforeSend: function () {
                // $("#tabs2-1").html("procesaando...");
            },
            success: function (respuesta) {

                //click boton mostrar ventana para registrar

                //$('#tabs2-1').html(respuesta);
                $('#tabs-1').html(respuesta);
                // $("#tabs").attr("style", "display: none"); 
                //document.getElementById('tabs').hidden = false;
            },
            error: function () {
                alert('Se ha producido un error');
            }
        });//fin ajax
    });//fin boton


///boton para eliminar datos funcionario
    $(".eliminarf").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion2");

//funcion para ventana emergenten al eliminar funcionario
        $(function () {
            $("#dialog-eliminarf").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Eliminar": function () {

                        $.ajax({
                            url: 'funcionarios/procesar.php',
                            type: 'POST',
                            data: {'identificacion2': valor},
                            beforeSend: function () {
                                // $("#tabs2-1").html("procesaando...");
                            },
                            success: function (respuesta) {
                                var i = parseInt($.trim(respuesta));
                                //click boton mostrar ventana para registrar

                                if (i === 1) {
                                    $("#tabs2-1").html("Eliminación Exitosa");
                                }
                                else {
                                    $("#tabs2-1").html("No se pudo eliminar usuarios");
                                }
                            },
                            error: function () {
                                alert('Se ha producido un error');
                            }
                        });//fin ajax
                        //cerrar ventana emergente
                        $(this).dialog("close");
                    },
                    Cancelar: function () {
                        $(this).dialog("close");
                    }
                }
            });
        });

    });//fin boton


///boton cerrar area de editar usuario
    $("#btnClosef2").click(function () {

        event.preventDefault();
        $.ajax({
            url: 'funcionarios/registros.php',
            type: 'POST',
            beforeSend: function () {
                $("#tabs-1").html("procesaando...");
            },
            success: function (respuesta) {
                // $("#tabs").attr("style", "display: block");
                $('#tabs-1').html(respuesta);
                $("#tabs2-1").html("");
            },
            error: function () {
                alert('Se ha producido un error');
            }
        });
    });//fin ajax

//actualizar datos USUARIO 
    $("#btnActualizarf").click(function () {

        var verificar = true;

        if (!document.frmFuncionario2.txtNombref.value)
        {
            alert("Ingresar Nombre");
            document.frmFuncionario2.txtNombref.focus();
            verificar = false;
        }

        else if (!document.frmFuncionario2.txtApellido.value)
        {
            alert("Ingresar Apellido");
            document.frmFuncionario2.txtApellido.focus();
            verificar = false;
        }
         else if (!document.frmFuncionario2.txtDireccion.value)
        {
            alert("Ingresar Direccion");
            document.frmFuncionario2.txtDireccion.focus();
            verificar = false;
        }
         else if (!document.frmFuncionario2.txtTelefono.value)
        {
            alert("Ingresar Telefono");
            document.frmFuncionario2.txtTelefono.focus();
            verificar = false;
        }
         else if (!document.frmFuncionario2.txtEmail.value)
        {
            alert("Ingresar Email");
            document.frmFuncionario2.txtEmail.focus();
            verificar = false;
        }
        
        

        //falta validar el tipo de usuario
        if (verificar === true)
        {
            //alert("aaaaa nuevo usuario");
            //REALIZAR AJAX
            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmFuncionario2").serialize(),
                //archivo servidor que recive
                url: "funcionarios/actualizar.php",
                //tipo de envio de datos
                type: "post",
                //funcion mientras procesa
                beforeSend: function () {
                    $("#resultado4").html("<h3>Procesando Información</h3>");
                },
                //respuesta del servidor
                success: function (respuesta) {
                    var i = parseInt($.trim(respuesta));

                    if (i === 1) {
                        $("#resultado4").html("Actualización Exitosa");
                        document.frmFuncionario2.txtNombre.focus();
                    }
                    else {
                        $("#resultado4").html("No se pudo actualizar datos");
                        document.frmFuncionario2.txtNombre.focus();
                    }
                }
            });//fin ajax
        }
    });/*fin boton click realizar registro usuario*/

//buscar datos USUARIO 
 $("#btnBuscarf").click(function () {

        var verificar = true;

        if (!document.frmFuncionarioBuscar.txtIdBusqueda.value)
        {
            alert("Ingresar Nombre");
            document.frmFuncionarioBuscar.txtIdBusqueda.focus();
            verificar = false;
        }
        if (verificar === true) {
            //REALIZAR AJAX
            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmFuncionarioBuscar").serialize(),
                //archivo servidor que recive
                url: "funcionarios/busqueda.php",
                //tipo de envio de datos
                type: "post",
                //funcion mientras procesa
                beforeSend: function () {
                    $("#tabs2-1").html("<h3>Procesando Información</h3>");
                },
                //respuesta del servidor
                success: function (respuesta) {
                    $("#tabs2-1").html(respuesta);
                }
            });//fin ajax
        }
    });/*fin boton click realizar registro usuario*/
  $(".imprimirf").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion3");

//funcion para ventana emergenten al eliminar usuario
        $(function () {
            $("#dialog-imprimirf").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Reporte": function () {
                       // location.href="usuarios/reporte2.php?id="+valor+"";
                       
                        $.ajax({
                            url: 'funcionarios/reporte2.php',
                            type: 'POST',
                            data: {'id': valor},
                            beforeSend: function () {
                                 $("#tabs2-1").html("Generando Reporte");
                            },
                            success: function (respuesta) {
                               
                                    $("#tabs2-1").html("Reporte Generado");
                                
                               
          
                            },
                            error: function () {
                                alert('Se ha producido un error');
                            }
                        });//fin ajax

                        //cerrar ventana emergente
                        $(this).dialog("close");
                    },
                    Cancelar: function () {
                        $(this).dialog("close");
                    }
                }
            });
        });

    });//fin boton

});//fin document
