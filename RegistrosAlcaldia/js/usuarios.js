/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function () {



///boton para modificar datos usuario
    $(".editar").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion1");
        $.ajax({
            url: 'usuarios/editar.php',
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
    $(".eliminar").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion2");

//funcion para ventana emergenten al eliminar usuario
        $(function () {
            $("#dialog-eliminar").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Eliminar": function () {

                        $.ajax({
                            url: 'usuarios/procesar.php',
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
    $(".imprimir").click(function () {
        //alert("editar");
        event.preventDefault();
        var valor;
        valor = $(this).attr("identificacion3");

//funcion para ventana emergenten al eliminar usuario
        $(function () {
            $("#dialog-imprimir").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Reporte": function () {
                       // location.href="usuarios/reporte2.php?id="+valor+"";
                       
                        $.ajax({
                            url: 'usuarios/reporte2.php',
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
    $("#btnClose2").click(function () {

        event.preventDefault();
        $.ajax({
            url: 'usuarios/registros.php',
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
    $("#btnActualizar").click(function () {

        var verificar = true;

        if (!document.frmUsuarioUsu.txtNombreUsu.value)
        {
            alert("Ingresar Nombre");
            document.frmUsuarioUsu.txtNombreUsu.focus();
            verificar = false;
        }

        else if (!document.frmUsuarioUsu.txtPasswordUsu.value)
        {
            alert("Ingresar password");
            document.frmUsuarioUsu.txtPasswordUsu.focus();
            verificar = false;
        }
        else if ($("#sregistroUsu").val() === "0") {//selecionar un tipo de usuario
            alert("Seleccionar Tipo de Usuario");
            $("#sregistroUsu").focus();//colocar el foco
            verificar = false;
        }

        //falta validar el tipo de usuario
        if (verificar === true)
        {
            //alert("aaaaa nuevo usuario");
            //REALIZAR AJAX
            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmUsuarioUsu").serialize(),
                //archivo servidor que recive
                url: "usuarios/actualizar.php",
                //tipo de envio de datos
                type: "post",
                //funcion mientras procesa
                beforeSend: function () {
                    $("#resultado2").html("<h3>Procesando Información</h3>");
                },
                //respuesta del servidor
                success: function (respuesta) {
                    var i = parseInt($.trim(respuesta));

                    if (i === 1) {
                        $("#resultado2").html("Actualización Exitosa");
                        document.frmUsuario.txtId.focus();
                    }
                    else {
                        $("#resultado2").html("No se pudo actualizar datos");
                        document.frmUsuario.txtId.focus();
                    }
                }
            });//fin ajax
        }
    });/*fin boton click realizar registro usuario*/

//buscar datos USUARIO 
    $("#btnBuscarUsu").click(function () {

        var verificar = true;

        if (!document.frmUsuarioBuscar.txtIdBusqueda.value)
        {
            alert("Ingresar Nombre");
            document.frmUsuarioBuscar.txtIdBusqueda.focus();
            verificar = false;
        }
        if (verificar === true) {
            //REALIZAR AJAX
            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmUsuarioBuscar").serialize(),
                //archivo servidor que recive
                url: "usuarios/busqueda.php",
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

    $(".imprimir").click(function () {
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
