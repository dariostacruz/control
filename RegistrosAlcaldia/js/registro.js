
$(document).ready(function () {



///boton para modificar datos usuario
    $(".editare").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion1");
        $.ajax({
            url: 'registro/editar.php',
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


///boton para eliminar usuario datos usuario
    $(".eliminare").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion2");

//funcion para ventana emergenten al eliminar usuario
        $(function () {
            $("#dialog-eliminare").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Eliminar": function () {

                        $.ajax({
                            url: 'registro/procesar.php',
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

///boton para eliminar usuario datos usuario
    $(".imprimire").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion3");

//funcion para ventana emergenten al eliminar usuario
        $(function () {
            $("#dialog-imprimire").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Reporte": function () {
                        // location.href="usuarios/reporte2.php?id="+valor+"";

                        $.ajax({
                            url: 'registro/reporte2.php',
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


///boton cerrar area de editar usuario
    $("#btnClosef2").click(function () {

        event.preventDefault();
        $.ajax({
            url: 'registro/registros.php',
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

//actualizar registros 
    $("#btnActualizareg").click(function () {

        var verificar = true;

       
         if (!document.frmRegistro1.txtCedular.value)
        {
            alert("Ingresar Cedula");
            document.frmRegistro1.txtCedular.focus();
            verificar = false;
        }

        else if (!document.frmRegistro1.txtFecha.value)
        {
            alert("Ingresar Fecha");
            document.frmRegistro1.txtFecha.focus();
            verificar = false;
        }

        else if (!document.frmRegistro1.txthora.value)
        {
            alert("Ingresar Hora");
            document.frmRegistro1.txthora.focus();
            verificar = false;
        }
        else if ($("#jornada").val() === "0") {//selecionar jornada
            alert("Seleccionar Jornada");
            $("#jornada").focus();//colocar el foco
            verificar = false;
        }
        else if ($("#ingreso").val() === "0") {//selecionar ingreso
            alert("Seleccionar Ingreso");
            $("#ingreso").focus();//colocar el foco
            verificar = false;
        }
        //falta validar el tipo de usuario
        if (verificar === true)
        {
            //alert("aaaaa nuevo usuario");
            //REALIZAR AJAX
            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmRegistro1").serialize(),
                //archivo servidor que recive
                url: "registro/actualizar.php",
                //tipo de envio de datos
                type: "post",
                //funcion mientras procesa
                beforeSend: function () {
                    $("#resultado7").html("<h3>Procesando Información</h3>");
                },
                //respuesta del servidor
                success: function (respuesta) {
                    var i = parseInt($.trim(respuesta));

                    if (i === 1) {
                        $("#resultado7").html("Actualización Exitosa");
                        document.frmRegistro.txtCedular.focus();
                    }
                    else {
                        $("#resultado7").html("No se pudo actualizar datos");
                        document.frmRegistro.txtCedular.focus();
                    }
                }
            });//fin ajax
        }
    });/*fin boton click realizar registro usuario*/

//buscar datos USUARIO 
    $("#btnBuscarReg").click(function () {

        var verificar = true;

        if (!document.frmRegistroBuscar.txtIdBusqueda.value)
        {
            alert("Ingresar Nombre");
            document.frmRegistroBuscar.txtIdBusqueda.focus();
            verificar = false;
        }
        if (verificar === true) {
            //REALIZAR AJAX
            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmRegistroBuscar").serialize(),
                //archivo servidor que recive
                url: "registro/busqueda.php",
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

    $(".imprimire").click(function () {
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
                            url: 'registro/reporte2.php',
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
