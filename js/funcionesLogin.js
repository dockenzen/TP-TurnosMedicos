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
function validarEmail()
{
    var envio = new FormData();
    envio.append("email", $("#email").val());

    var funcionAjax = $.ajax({
        url:'php/validaremail.php',
        type:'POST',
        contentType: false,
    	processData: false,
		data:envio
      });

    funcionAjax.done(function(respuesta){
     var retorno = JSON.parse(respuesta);
        $("#principal").html(retorno);
     //   $("#email").val('');
  		$("#informe").html("Correcto");
    });

    funcionAjax.fail(function(respuesta){
     var retorno = JSON.parse(respuesta);
    //	alert(respuesta);
		$("#principal").html(retorno);
		$("#sidebar").html(":(");
	});
  
 }