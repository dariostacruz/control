

$(document).ready(function () {

//ventana de dialogo para registrar usuarios
    $(function () {
        var dialog, form,
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                name = $("#name"),
                email = $("#email"),
                password = $("#password"),
                allFields = $([]).add(name).add(email).add(password),
                tips = $(".validateTips");

        dialog = $("#dialogo2").dialog({
            autoOpen: false,
            height: 400,
            width: 400,
            modal: true,
            buttons: {
            },
            close: function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = dialog.find("form").on("submit", function (event) {
            event.preventDefault();
        });
        
        //click boton mostrar ventana para registrar
        $("#btnNuevo").button().on("click", function () {
            dialog.dialog("open");
        });
        //click boton cancelar ventana para registrar
        $("#btnClose").button().on("click", function () {
            dialog.dialog("close");
        });
    });//fin ventana de inicio de sesión

///boton para listar usuarios
    $("#btnListar").click(function () {

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
///boton para registrar nuevos usuarios
    $("#btnBuscar").click(function () {
        event.preventDefault();
        $.ajax({
            url: 'usuarios/buscar.php',
            type: 'GET',
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
        });//fin ajax
    });//fin boton
    ///boton para imprimir reporte general
    $("#btnReporte").click(function () {
        //alert("editar");
        event.preventDefault();
      
        $(function () {
            $("#dialog-Reporte").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Reporte": function () {
                       // location.href="usuarios/reporte2.php?id="+valor+"";
                       
                        $.ajax({
                            url: 'usuarios/reporte.php',
                            type: 'POST',
                         
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



///PROGRAMACION FUNCIONARIO

//ventana de dialogo para registrar funcionarios
    $(function () {
        var dialog, form,
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                name = $("#name"),
                email = $("#email"),
                password = $("#password"),
                allFields = $([]).add(name).add(email).add(password),
                tips = $(".validateTips");

        dialog = $("#dialogo3").dialog({
            autoOpen: false,
            height: 400,
            width: 400,
            modal: true,
            buttons: {
            },
            close: function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = dialog.find("form").on("submit", function (event) {
            event.preventDefault();
        });
        
        //click boton mostrar ventana para registrar
        $("#btnNuevo2").button().on("click", function () {
            dialog.dialog("open");
        });
        //click boton cancelar ventana para registrar
        $("#btnClose2").button().on("click", function () {
            dialog.dialog("close");
        });
    });//fin ventana de inicio de sesión
//registrar USUARIO nuevo
    $("#enviar_funcionario").click(function () {

        var verificar = true;

         if (!document.frmFuncionario.txtCedula.value)
        {
            alert("Ingresar Cedula");
            document.frmFuncionario.txtCedula.focus();
            verificar = false;
        }
        else if (!document.frmFuncionario.txtNombref.value)
        {
            alert("Ingresar Nombre");
            document.frmFuncionario.txtNombref.focus();
            verificar = false;
        }

        else if (!document.frmFuncionario.txtApellido.value)
        {
            alert("Ingresar Apellido");
            document.frmFuncionario.txtApellido.focus();
            verificar = false;
        }
        else if (!document.frmFuncionario.txtDireccion.value)
        {
             alert("Ingresar direccion");
            document.frmFuncionario.txtDireccion.focus();
            verificar = false;
        }
        else if (!document.frmFuncionario.txtTelefono.value)
        {
            alert("Ingresar Telefono");
            document.frmFuncionario.txtTelefono.focus();
            verificar = false;
        }
        else if (!document.frmFuncionario.txtEmail.value)
        {
            alert("Ingresar Email");
            document.frmFuncionario.txtEmail.focus();
            verificar = false;
        }
        
        //falta validar el tipo de usuario
        if (verificar === true)
        {
            //alert("aaaaa nuevo usuario");
            //REALIZAR AJAX
            $.ajax({
                //datos formulario a enviar al servidor
                data: $("#frmFuncionario").serialize(),
                //archivo servidor que recive
                url: "funcionarios/procesar.php",
                //tipo de envio de datos
                type: "post",
                //funcion mientras procesa
                beforeSend: function (){
                    $("#resultado3").html("<h3>Procesando Información</h3>");
                },
                //respuesta del servidor
                success: function (respuesta){
                    var i = parseInt($.trim(respuesta));
                    
                    if (i === 1){
                         $("#resultado3").html("Funcionario existe");
                         
                         document.frmFuncionario.txtIdf.focus();
                          
                    }
                    else if (i === 2){
                        $("#resultado3").html("Registro exitoso");
          
                        $("input[type=text]").val("");//limpiar casillas
                    }
                    else{
                        $("#resultado3").html("Error al registrar usuario");
                    }   
                }
            });//fin ajax
        }
    });/*fin boton click realizar registro usuario*/
    
///boton para listar usuarios
    $("#btnListar2").click(function () {

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
    
    $("#btnBuscar2").click(function () {
        event.preventDefault();
        $.ajax({
            url:'funcionarios/buscar.php',
            type:'GET',
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
        });//fin ajax
    });//fin boton
    


///PROGRAMACION REGISTRO

//ventana de dialogo para registros
    $(function () {
        var dialog, form,
                emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
                name = $("#name"),
                email = $("#email"),
                password = $("#password"),
                allFields = $([]).add(name).add(email).add(password),
                tips = $(".validateTips");

        dialog = $("#dialogo4").dialog({
            autoOpen: false,
            height: 400,
            width: 400,
            modal: true,
            buttons: {
            },
            close: function () {
                form[ 0 ].reset();
                allFields.removeClass("ui-state-error");
            }
        });

        form = dialog.find("form").on("submit", function (event) {
            event.preventDefault();
        });
        
        //click boton mostrar ventana para registrar
        $("#btnNuevo3").button().on("click", function () {
            dialog.dialog("open");
        });
        //click boton cancelar ventana para registrar
        $("#btnClose3").button().on("click", function () {
            dialog.dialog("close");
        });
    });//fin ventana de inicio de sesión
//registrar nuevo
    $("#enviar_registro").click(function () {

        var verificar = true;

         if (!document.frmRegistro.txtCedular.value)
        {
            alert("Ingresar Cedula");
            document.frmRegistro.txtCedular.focus();
            verificar = false;
        }
        else if (!document.frmRegistro.txtFecha.value)
        {
            alert("Ingresar Fecha");
            document.frmRegistro.txtFecha.focus();
            verificar = false;
        }

        else if (!document.frmRegistro.txthora.value)
        {
            alert("Ingresar Hora");
            document.frmRegistro.txthora.focus();
            verificar = false;
        }
       else if ($("#jornada").val() === "0") {//selecionar un tipo de usuario
            alert("Seleccionar Jornada");
            $("#jornada").focus();//colocar el foco
            verificar = false;
        }
        else if ($("#ingreso").val() === "0") {//selecionar un tipo de usuario
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
                data: $("#frmRegistro").serialize(),
                //archivo servidor que recive
                url: "registro/procesar.php",
                //tipo de envio de datos
                type: "post",
                //funcion mientras procesa
                beforeSend: function (){
                    $("#resultado7").html("<h3>Procesando Información</h3>");
                },
                //respuesta del servidor
                success: function (respuesta){
                    var i = parseInt($.trim(respuesta));
                    
                    if (i === 1){
                         $("#resultado7").html("Registro existe");
                         
                         document.frmRegistro.txtIdf.focus();
                          
                    }
                    else if (i === 2){
                        $("#resultado7").html("Registro exitoso");
          
                        $("input[type=text]").val("");//limpiar casillas
                    }
                    else{
                        $("#resultado7").html("Error al registrar");
                    }   
                }
            });//fin ajax
        }
    });/*fin boton click realizar registro usuario*/
    
///boton para listar usuarios
    $("#btnListar3").click(function () {

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
    
    $("#btnBuscar3").click(function () {
        event.preventDefault();
        $.ajax({
            url:'registro/buscar.php',
            type:'GET',
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
        });//fin ajax
    });//fin boton
    
    ///boton para imprimir reporte general de funcionarios
    $("#btnReporte2").click(function () {
        //alert("editar");
        event.preventDefault();
      
        $(function () {
            $("#dialog-Reporte2").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Reporte": function () {
                       // location.href="usuarios/reporte2.php?id="+valor+"";
					   var direccion="funcionarios/reporte.php";
					   var value=1;
                       window.open(direccion+'?value='+value);
                        /*
						$.ajax({
                            url: 'funcionarios/reporte.php',
                            type: 'POST',
                         
                            beforeSend: function () {
                                 $("#tabs2-1").html("Generando Reporte");
                            },
                            success: function (respuesta) {
                               							alert(respuesta);
                                    $("#tabs2-1").html("Reporte Generado");
                            },
                            error: function () {
                                alert('Se ha producido un error');
                            }
                        });//fin ajax
*/
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
     ///boton para imprimir reporte general de registro
    $("#btnReporte3").click(function () {
        //alert("editar");
	
        event.preventDefault();
      
        $(function () {
            $("#dialog-Reporte3").dialog({
                resizable: false,
                height: 180,
                modal: true,
                buttons: {
                    "Reporte": function () {
						alert("aqui");
                       // location.href="usuarios/reporte2.php?id="+valor+"";
                       var direccion="usuarios/reporte2.php";
					   var value=1;
                       window.open(direccion+'?value='+value);
					   /*
                        $.ajax({
                            url: 'registro/reporte.php',
                            type: 'POST',
                         
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
*/
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

}); //fin document ready
///boton para registrar nuevos usuarios
function Registrar_usuario()
{
var numero_id=document.getElementById("txtId").value;
var nombre=document.getElementById("txtNombre").value;
var clave=document.getElementById("txtPassword").value;
var tipo_usuario=document.getElementById("sregistro").value;


valor_enviar=numero_id+'//'+nombre+'//'+clave+'//'+tipo_usuario;
if(numero_id=="" || nombre=="" || clave=="" || tipo_usuario=="")
{
alert("ERROR, FALTAN DATOS POR COMPLETAR...");

}
var value =valor_enviar;

jQuery.ajax({	
		    type: "POST",
            url:'usuarios/crear_nuevo_cliente.php',
			async: false,
			data:{value:value},
            success:function(respuesta){
	 
				alert(respuesta)
				window.close();
										},
            error: function () {
				  alert("Error inesperado")
				  window.top.location ="../index.html";	
			}
        });
}

function reporte_usua()
{
var direccion="usuarios/reporte2.php";
					   var value=1;
                       window.open(direccion+'?value='+value);
}