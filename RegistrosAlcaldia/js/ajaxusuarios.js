
$(document).ready(function () {

// //registrar USUARIO nuevo
//    $("#enviar_registro").click(function () {
//
//        var verificar = true;
//
//         if (!document.frmRegistro.txtId.value)
//        {
//            alert("Ingresar Identificación");
//            document.frmRegistro.txtId.focus();
//            verificar = false;
//        }
//        else if (!document.frmRegistro.txtNombre.value)
//        {
//            alert("Ingresar Nombre");
//            document.frmRegistro.txtNombre.focus();
//            verificar = false;
//        }
//
//        else if (!document.frmRegistro.txtPassword.value)
//        {
//            alert("Ingresar password");
//            document.frmRegistro.txtPassword.focus();
//            verificar = false;
//        }
//        else if ($("#sregistro").val() === "0"){//selecionar un tipo de usuario
//            alert("Seleccionar Tipo de Usuario");
//            $("#sregistro").focus();//colocar el foco
//            verificar = false;
//        }
//        
//        //falta validar el tipo de usuario
//        if (verificar === true)
//        {
//            //alert("aaaaa nuevo usuario");
//            //REALIZAR AJAX
//            $.ajax({
//                //datos formulario a enviar al servidor
//                data: $("#frmRegistro").serialize(),
//                //archivo servidor que recive
//                url: "procesar.php",
//                //tipo de envio de datos
//                type: "post",
//                //funcion mientras procesa
//                beforeSend: function (){
//                    $("#tabs2-1").html("<h3>Procesando Información</h3>");
//                },
//                //respuesta del servidor
//                success: function (respuesta){
//                    var i = parseInt($.trim(respuesta));
//                    
//                    if (i === 1){
//                         $("#tabs2-1").html("Usuario existe");
//                         $("input[type=password]").val("");//limpiar casillas 
//                         document.frmRegistro.txtId.focus();
//                          
//                    }
//                    else if (i === 2){
//                        $("#tabs2-1").html("Registro exitoso");
//                        $("input[type=password]").val("");//limpiar casillas 
//                        $("input[type=text]").val("");//limpiar casillas
//                    }
//                    else{
//                        $("#tabs2-1").html("Error al registrar usuario");
//                    }   
//                }
//            });//fin ajax
//        }
//    });/*fin boton click ajax realizar registro usuario*/


});//fin document