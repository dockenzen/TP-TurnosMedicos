
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<script type="text/javascript">
$("#content").css("width", "500px");
</script>
<?php
		  session_start();

          require_once("clases/AccesoDatos.php");
          require_once("clases/especialidad.php");
          require_once("clases/usuario.php");
          require_once("clases/medico.php");

		  if(isset($_SESSION['registrado']))
      {	$user = usuario::TraerUnUsuarioPorCorreo($_SESSION['registrado']);}

      $arrayEspecialidades = especialidad::TraerTodasLasEspecialidades();

if(isset($_SESSION['registrado']))
{  ?>
    <div class="container">
  	<h2 class="form-ingreso-heading">Generar Consulta</h2>
  <form id="formConsulta" method="POST" enctype="multipart/form-data" class="form-ingreso " onsubmit="GuardarConsulta(); return false;">
  	<div id="divEspecialidad">
		<label for="especialidad">Especialidad</label>
        <br>
    	<?php
        	echo "<select id=especialidad class='form-control' onchange='ElegirEspecialidad()'>";
        	echo "<option value=0>Seleccione una Especialidad</option>";
        	foreach ($arrayEspecialidades as $espe)
        	{
        	  	echo "<option value='$espe->especialidadid'>$espe->nombre</option>";
        	}
        	echo "</select>";
		  ?>
	</div>
	<div id="divMedico" hidden>


  </div>
  <div id="divHorario" hidden>


	</div>

	<div id="divSintoma" hidden>
	      <label for="sintoma">Describa sus sintomas</label>
	     	<textarea rows="4" cols="39" name="sintoma" id="sintoma" hidden>
		    </textarea >
		    <br>
	</div>
        <input type="hidden" name="usuarioid" id="usuarioid" value="<?php echo $user->usuarioid ?>" readonly>
        <input type="hidden" name="espeId" id="espeId" readonly>
        <input type="hidden" name="medId" id="medId" readonly>
        <input type="hidden" name="horarioFinal" id="horarioFinal" readonly>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reservar</button>
      </form>
    </div> <!-- /container -->

  <?php
}
  else{    echo"<h3>Usted no esta loguedo. </h3>"; }

  ?>
