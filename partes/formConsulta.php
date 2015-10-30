
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
		  
		  $user = usuario::TraerUnUsuarioPorCorreo($_SESSION['registrado']);

          $arrayEspecialidades = especialidad::TraerTodasLasEspecialidades();

if(isset($_SESSION['registrado']))
{  ?>
    <div class="container">
  	<h2 class="form-ingreso-heading">Generar Consulta</h2>
  <form id="formConsulta" method="POST" enctype="multipart/form-data" class="form-ingreso " onsubmit="GuardarConsulta(); return false;">
  	<input type="hidden" name="usuarioid" id="usuarioid" value="<?php echo '$user->usuarioid' ?>" readonly>
  	<div id="divEspecialidad">
		<label for="especialidad">Especialidad</label>
        <br>                    	
    	<?php
        	echo "<select id=especialidad class='form-control' onclick='ElegirEspecialidad()'>";
        	echo "<option value=0>Seleccione una Especialidad</option>";
        	foreach ($arrayEspecialidades as $espe) 
        	{
        	  	echo "<option value='$espe->especialidadid'>$espe->nombre</option>";
        	}
        	echo "</select>";
		?>   
	</div>
	<div id="divMedico" hidden>
        <br>                    	

		<input type="hidden" name="espeId" id="espeId" readonly>
        <label for="nombre">Medicos disponibles</label>
                <br>                    	

        <?php
        var_dump($_POST);
        	$valor = $_POST["valor"];
        	$arrayMedicos = medico::TraerTodosLosMedicosPorEspecialidad(2);

        	echo "<select id=medico class='form-control' onclick='ElegirMedico()'>";
        	echo "<option value=0>Seleccione un Doctor</option>";
        	foreach ($arrayMedicos as $medi) 
        	{
        	  	echo "<option value='$medi->medicoid'>$medi->nombreMedico</option>";
        	}
        	echo "</select>";
		?>
        
        <br>    
    </div>
    <div id="divHorario" hidden>
        <label for="horarioEntrada">Horarios disponibles</label>
        <input type="time" id="horarioEntrada" class="form-control" placeholder="Seleccione horario" required="" autofocus="">
        <br>      
	</div>
		<input type="hidden" name="id" id="id" readonly>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Reservar</button>
      </form>
    </div> <!-- /container -->

  <?php 
}
  else{    echo"<h3>Usted no esta loguedo. </h3>"; }

  ?>
    
  
