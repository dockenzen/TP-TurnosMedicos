
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
function MostrarSinParametros()
{
	var funcionAjax=$.ajax({url:"nexoTexto.php"});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#sidebar").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#sidebar").html(retorno.responseText);
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
	$("#espeId").val(valor); 	

 			var valor = $("#especialidad").val();	
   			$.ajax({
	  		url: 'formConsulta.php',
  			type: 'POST',
  			async: true,
  			data: valor=valor,
  			//success: procesaRespuesta,
  			//error: muestraError
  			beforeSend: function () {
                        $("#informe").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#informe").html(response);
                }
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
	var med = $("#medico").val();
	if(med != 0)
	{
	document.getElementById('divHorario').style.display = "inherit";		
	}
	else
	{
	document.getElementById('divHorario').style.display = "none";			
	}
}
