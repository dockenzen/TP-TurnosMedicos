
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
				document.getElementById('botonSubmit').disabled = true;
   		}

}
function ElegirMedico()
{
 	var valor = $("#medico").val();
 	$("#medId").val(valor);

	var funcionAjax = $.ajax({
			url: 'partes/diasMedico.php',
			type: 'POST',
			async: true,
			data: {valor:valor}
		});

    funcionAjax.done(function(retorno){
		$("#divDia").html(retorno);
		$("#informe").html("Seleccion de dia");
		});

	if(valor != 0)
	{
	document.getElementById('divDia').style.display = "inherit";
	}
	else
	{
	document.getElementById('divDia').style.display = "none";
	document.getElementById('botonSubmit').disabled = true;
	}
}
function ElegirDia()
{

	var valor = $("#dia").val();
	var medId = $("#medId").val();
 	$("#fechaid").val(valor);

	//horariosDisponibles
	var funcionAjax = $.ajax({
			url: 'partes/horariosDisponibles.php',
			type: 'POST',
			async: true,
			data: {valor:valor,
						 medId:medId
					  }
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
		document.getElementById('botonSubmit').disabled = true;
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
	document.getElementById('botonSubmit').disabled = true;
	}

	if($("#especialidad").val() != 0 && $("#medico").val() != 0 && $("#horarioConsulta").val() != 0 && $("#dia").val() != 0)
	{
		document.getElementById('botonSubmit').disabled = false;
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
function TraerNoticias()
{
	TraerClima();

	var funcionAjax =$.ajax({
		url:'TraerNoticias.php'
	});
	funcionAjax.done(function(retorno)
	{
		$("#noticias").html(retorno);

    $("#noticias").each(function (index)
        {
        	//remuevo las imagenes de mas y los espaciosssss
            $("img").remove();
            $("br").remove();
        })
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
function TraerClima()
{
	var funcionAjax =$.ajax({
		url:'TraerClima.php'
	});
	funcionAjax.done(function(retorno)
	{
		//alert(retorno);
		$("#clima").html(retorno);
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