function BorrarUsuario(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarUsuario",
			id:idParametro
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);
	});
}

$(document).ready(function (e){
		$("#formReg").on('submit',(function(e){
		e.preventDefault();
	$.ajax({
		url: "GuardarUsuario.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,

success: function(data){
		$("#targetLayer").html(data);
					   },
error: function(){} 	        
		  });
											  }));
});

function EditarUsuario(idParametro)
{
    Mostrar('MostrarFormAlta');
	//alert("Modificar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerUsuario",
			id:idParametro
		}
	});
	funcionAjax.done(function(retorno){
		var user =JSON.parse(retorno);
		$("#id").val(user.usuarioid);
		$("#nombre").val(user.nombre);
		$("#correo").val(user.correo);
		$("#clave").val(user.clave);
		$("#provincia").val(user.provincia);
        $("#localidad").val(user.localidad);
        $("#direccion").val(user.direccion);
        if(voto.sexo == "F")
             $('input:radio[name="sexo"][value="F"]').prop('checked', true);
        else
            $('input:radio[name="sexo"][value="M"]').prop('checked', true);

	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);
	});
}

function GuardarUsuario()
{
	/*	$("#formReg").on('submit',(function(e){
		e.preventDefault();
	$.ajax({
		url: "../php/GuardarUsuario.php",
		type: "POST",
		data:  new FormData(this),
		contentType: false,
		cache: false,
		processData:false,

success: function(data){
		$("#targetLayer").html(data);
					   },
error: function(){} 	        
		  });
		  	})
)
  */      var id = $("#id").val();
		var nombre=$("#nombre").val();
		var correo=$("#correo").val();
		var clave=$("#clave").val();
		var foto=$("#fichero").val();
		var provincia=$("#provincia").val();
        var localidad=$("#localidad").val();
        var direccion=$("#direccion").val();
		var sexo=$('input:radio[name=sexo]:checked').val();
		//alert(foto);
		var funcionAjax=$.ajax({
		url:"php/GuardarUsuario.php",
		type:"POST",
		data:{
			//queHacer:"GuardarUsuario",
			nombre:nombre,
			correo:correo,
			clave:clave,
			foto:foto,
			provincia:provincia,
            localidad:localidad,
            direccion: direccion,
			sexo:sexo,
            id: id
		}
	});
	funcionAjax.done(function(retorno){
		alert(retorno);
			//deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		alert(retorno);
		$("#informe").html(retorno.responseText);
	});
}
function VerEnMapa(prov, dire, loc, id)
{
    //alert(prov + dire +  loc);
    var punto = dire +", " +  loc  +", " +  prov +", Argentina";
    console.log(punto);
    var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"VerEnMapa"
		}
	});
    funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
        $("#punto").val(punto);
        $("#id").val(id);
	Geolocalizacion.Marcador.iniciar();
	Geolocalizacion.Marcador.verMarcador();
	});
}
