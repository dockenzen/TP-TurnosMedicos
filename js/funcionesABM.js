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
		Mostrar("MostrarGrilla");
		//alert(retorno);
		$("#informe").html("cantidad de eliminados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);
	});
}

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
        if(user.sexo == "F")
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
	    cargar();
	    var envio = new FormData();
    	    var files = $("#fichero").get(0).files; // $("#fichero") slector por id de jquery 
            envio.append("correo", $("#correo").val());
            envio.append("clave", $("#clave").val());
            envio.append("nombre", $("#nombre").val());
            envio.append("provincia", $("#provincia").val());
            envio.append("localidad", $("#localidad").val());
            envio.append("direccion", $("#direccion").val());
            envio.append("id", $("#id").val());
            envio.append("sexo", $('input:radio[name=sexo]:checked').val());
   
            for (var i = 0; i < files.length; i++)
            {
            envio.append("fichero0", files[i]);
            }

		var funcionAjax=$.ajax({
		url:"GuardarUsuario.php",
		type:"POST",
		contentType: false,
    	processData: false,
		data:envio

	});
	funcionAjax.done(function(retorno){
		alert("Usuario creado con exito !");
			//deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		alert("Error al crear su usuario");
		$("#informe").html(retorno.responseText);
	});
	MostrarLogin();
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
function cargar(){
    var files = $("#fichero").get(0).files; // $("#fichero") slector por id de jquery  
    var envio = new FormData();
    for (var i = 0; i < files.length; i++) {
    envio.append("fichero0", files[i]);
    }
    var promise = $.ajax
            ({
            type: "POST",
            url: "ValidarFoto.php",
            contentType: false,
    		processData: false,
            data: envio,
            cache: false,
            dataType: "text"
          });// fin del ajax
            
    // la funcion Ajax me devuelve una promesa de javascript, algo que va a hacerse. Cuando el servidor responde y si la respuesta del servidor es exitosa ingresa al done y ejecuta la función que se le pasa
    promise.done(function (dato){ 
    	//alert(dato);
                    $('#error').hide();
                    console.log(dato);
                    var strIndex = dato.indexOf('Error');
                    if(strIndex == -1) {
                        //string no encontrado
                        $('#imagen').attr("src", "FotosTemp/" + files[0].name);
                         $('#error').html("");
                    } else {
                        //string encontrado
                        $('#error').html(dato);
                        $('#error').show();
                        $('#imagen').attr("src", "");
                        $('#fichero').val("");
                    }
    });
}
function BorrarMedico(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarMedico",
			id:idParametro
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrillaMedicos");
		//alert(retorno);
		$("#informe").html("cantidad de eliminados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		$("#informe").html(retorno.responseText);
	});
}
function EditarMedico(idParametro)
{
	MostrarMedicos('MostrarFormAltaMedicos');
	//esto tendria que estar dentro de una funcion ajax para que se ejecute 
	//antes que la funcion ajax de traer medico
	
	var funcionAjax=$.ajax({

		url:"nexo.php",
		type:"post",
		async:false,
		//tendria que ejecutarse antes del envio pero we... nose
		data:{
				queHacer:"TraerMedico",
				id:idParametro
		     }
	});
	funcionAjax.done(function(retorno){

		var retorno = JSON.parse(retorno);
		
		$("#medicoid").val(retorno.medicoid);
		$("#nombreMedico").val(retorno.nombreMedico);
		$("#especialidadid").val(retorno.especialidadid);
        $("#horarioEntrada").val(retorno.horarioEntrada);
        $("#horarioSalida").val(retorno.horarioSalida);
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);
	});
}
function GuardarMedico()
{
	    var envio = new FormData();
            envio.append("nombreMedico", $("#nombreMedico").val());
            envio.append("especialidadid", $("#especialidadid").val());
            envio.append("horarioEntrada", $("#horarioEntrada").val());
            envio.append("horarioSalida", $("#horarioSalida").val());
            envio.append("id", $("#id").val());

		var funcionAjax=$.ajax({
		url:"php/GuardarMedico.php",
		type:"POST",
		contentType: false,
    	processData: false,
		data:envio

	});
	funcionAjax.done(function(retorno){
		alert(retorno);
		alert("Medico creado con exito !");
			//deslogear();
		$("#informe").html("cantidad de agregados "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		alert("Error al crear al medico");
		$("#informe").html(retorno.responseText);
	});
	MostrarLogin();
}
function GuardarConsulta()
{
	    var envio = new FormData();
            envio.append("sintoma", $("#sintoma").val());
            envio.append("espeId", $("#espeId").val());
            envio.append("medId", $("#medId").val());
            envio.append("horarioConsulta", $("#horarioConsulta").val());
            envio.append("usuarioid", $("#usuarioid").val());

		var funcionAjax=$.ajax({
		queHacer:'GuardarConsulta',
		url:"nexo.php",
		type:"POST",
		contentType: false,
    	processData: false,
		data:envio

	});
	funcionAjax.done(function(retorno){
		alert(retorno);
		alert("Consulta generada con exito !");
			//deslogear();
		$("#informe").html("Consultas agregadas "+ retorno);

	});
	funcionAjax.fail(function(retorno){
		alert("Error al generar consulta");
		$("#informe").html(retorno.responseText);
	});
	MostrarLogin();
}