function validarLogin()
{
		var correo=$("#correo").val();
		var clave=$("#clave").val();
		var recordar=$("#recordarme").is(':checked');

//$("#sidebar").html("<img src='imagenes/ajax-loader.gif' style='width: 30px;'/>");

	var funcionAjax=$.ajax({
		url:"php/validarUsuario.php",
		type:"post",
		data:{
			recordarme:recordar,
			correo:correo,
			clave:clave
		}
	});
	funcionAjax.done(function(retorno){
			if(retorno.trim()=="ingreso")
			{
				MostrarBotones();
				MostrarLogin();

			//	$("#BotonLogin").html("Ir a salir<br>-Sesión-");
			//	$("#BotonLogin").addClass("btn btn-danger");				
			//	$("#usuario").val("usuario: "+retorno);
			}else
			{
				$("#Contador").html("usuario o clave incorrecta");	
				$("#formLogin").addClass("animated bounceInLeft");
			}

	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#sidebar").html(retorno.responseText);
	});

}
function deslogear()
{
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"
	});
	funcionAjax.done(function(retorno){
			MostrarLogin();
			MostrarBotones();
	});
}
function MostrarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarBotones"}
	});
	funcionAjax.done(function(retorno){		
		$("#botonesABM").html(retorno);
		//$("#sidebar").html("Correcto BOTONES!!!");

	});
}

  $(document).ready(function(){
    $("#frmRestablecer").submit(function(event){
      event.preventDefault();
      $.ajax({
        url:'validaremail.php',
        type:'post',
        dataType:'json',
        data:$("#frmRestablecer").serializeArray()
      }).done(function(respuesta){
        $("#mensaje").html(respuesta.mensaje);
        $("#email").val('');
      });
    });
  });
