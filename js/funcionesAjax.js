
function MostrarError()
{
	var funcionAjax=$.ajax({url:"nexoNoExiste.php",type:"post",data:{queHacer:"MostrarTexto"}});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#sidebar").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
			$("#principal").html("error :(");
		$("#sidebar").html(retorno.responseText);
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});
}
function MostrarMedicos(queMostrar)
{

	var queHacer=queMostrar;
	var funcionAjax=$.ajax({
		url:"nexo.php",
		async:false,
		type:"post",
		data:{queHacer:queMostrar}
		});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		//$("#sidebar").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		//$("#sidebar").html(retorno.responseText);
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});
}

function Mostrar(queMostrar)
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		//$("#sidebar").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
	//	$("#sidebar").html(retorno.responseText);
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});
}

function MostrarLogin()
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto Form login!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#botonesABM").html(":(");
		$("#informe").html(retorno.responseText);
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}
function ElegirEspecialidad()
{
	document.getElementById('divHorario').style.display = "none";	


 			var valor = $("#especialidad").val();	
 			$("#espeId").val(valor); 	

   		var funcionAjax = $.ajax({
	  		url: 'partes/medicosDisponibles.php',
  			type: 'POST',
  			async: true,
  			data: {valor:valor}

  			});
            funcionAjax.done(function(retorno){
			$("#divMedico").html(retorno);
			$("#informe").html("Seleccion de medico");
			

		});
   		if(valor != 0)
   		{

   			document.getElementById('divMedico').style.display = "inherit";	
   		}
   		else
   		{
   			document.getElementById('divMedico').style.display = "none";	
   		}	

}
function ElegirMedico()
{
 	var valor = $("#medico").val();	
 	$("#medId").val(valor); 	

	var funcionAjax = $.ajax({
			url: 'partes/horariosDisponibles.php',
			type: 'POST',
			async: true,
			data: {valor:valor}
		});

        funcionAjax.done(function(retorno){
		$("#divHorario").html(retorno);
		$("#informe").html("Seleccion de horario");
		});

	if(valor != 0)
	{
	document.getElementById('divHorario').style.display = "inherit";		
	}
	else
	{
	document.getElementById('divHorario').style.display = "none";			
	}
}
function ElegirHorario()
{
	var valor = $("#horarioConsulta").val();	
 	$("#horarioFinal").val(valor); 	

	if(valor != 0)
	{
	document.getElementById('divSintoma').style.display = "inherit";		
	}
	else
	{
	document.getElementById('divSintoma').style.display = "none";			
	}
}



/*	En Revision
function RestablecerPass($token, $idusuario)
{

		Mostrar('restablecer')

	    var envio = new FormData();

        envio.append("token", $token);
        envio.append("idusuario", $idusuario);

		var funcionAjax=$.ajax({
		url:"php/restablecer.php",
		type:"POST",
		contentType: false,
    	processData: false,
		data:envio
	});
	funcionAjax.done(function(retorno){
	//	alert("Usuario creado con exito !");
			//deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
	//	alert("Error al crear su usuario");
		$("#informe").html(retorno.responseText);
	});
}*/
function TraerClima()
{
	var funcionAjax =$.ajax({
		url:'TraerClima.php'
	});
	funcionAjax.done(function(retorno)
	{
		$("#noticias").html(retorno);
		//$("#imagenClima").src=retorno;
		//alert(retorno);
	});
	funcionAjax.fail(function(retorno)
	{
		//alert(retorno);
	});
	funcionAjax.always(function(retorno)
	{
		//alert(retorno);
	});
}