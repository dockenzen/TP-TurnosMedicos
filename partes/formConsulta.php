
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<script type="text/javascript">
$("#content").css("width", "500px");
</script>
<?php 
          require_once("clases/AccesoDatos.php");
          require_once("clases/especialidad.php");
          require_once("clases/usuario.php");
		  
		  $user = usuario::TraerUnUsuarioPorCorreo($_SESSION['registrado']);

          $arrayEspecialidades = especialidad::TraerTodasLasEspecialidades();
		  session_start();

if(isset($_SESSION['cliente']))
{  ?>
    <div class="container">
  	<h2 class="form-ingreso-heading">Generar Consulta</h2>
  <form id="formConsulta" method="POST" enctype="multipart/form-data" class="form-ingreso " onsubmit="GuardarConsulta(); return false;">
  <input type="hidden" name="nombre" id="nombre" value="<?php echo '$user->nombre' ?>" readonly>
	<label for="especialidadid">Especialidad</label>
        <br>                    	
    <?php
        echo "<select id=especialidadid class='form-control' onclick='ElegirEspecialidad()'>";
        foreach ($arrayEspecialidades as $espe) 
        {
          echo "<option value='$espe->especialidadid'>$espe->nombre</option>";
        }
        echo "</select>";
	?>        
        <label for="nombre">Medicos disponibles</label>
                <input type="text" id="nombre" class="form-control" placeholder="Nombre y Apellido" required="" autofocus="">
        <br>    
        <label for="horarioEntrada">Horarios disponibles</label>
                <input type="time" id="horarioEntrada" class="form-control" placeholder="Seleccione horario" required="" autofocus="">
        <br>      
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>
    </div> <!-- /container -->

  <?php 
}
  else{    echo"<h3>Usted no esta loguedo. </h3>"; }

  ?>
    
  
