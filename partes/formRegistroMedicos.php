
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 <script type="text/javascript">
$("#content").css("width", "500px");
</script>
<?php 
          require_once("clases/AccesoDatos.php");
          require_once("clases/especialidad.php");
          $arrayEspecialidades = especialidad::TraerTodasLasEspecialidades();
session_start();
if(isset($_SESSION['administrador'])){  ?>
    <div class="container">

      <form id="formRegMed" method="POST" enctype="multipart/form-data" class="form-ingreso " onsubmit="GuardarMedico(); return false;">
        <h2 class="form-ingreso-heading">Registro de Medico</h2>
        
        <label for="nombre">Nombre del profesional</label>
                <input type="text" id="nombre" class="form-control" placeholder="Nombre y Apellido" required="" autofocus="">
        <br>
        <!--Aca select de especialidad-->
        <label for="especialidadid">Especialidad</label>
<?php
        echo "<select id=especialidadid class='form-control'>";
        foreach ($arrayEspecialidades as $espe) 
        {
          echo "<option value='$espe->especialidadid'>$espe->nombre</option>";
        }
        echo "</select>";
?>        
        <br>                
        <label for="horarioEntrada">Horario de Entrada Laboral</label>
                <input type="time" id="horarioEntrada" class="form-control" placeholder="Seleccione horario" required="" autofocus="">
        <br>
        <label for="horarioSalida">Horario de Salida Laboral</label>
                <input type="time" valign="middle" id="horarioSalida" class="form-control" placeholder="Seleccione horario" required="" autofocus="">
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>Usted no tiene permisos suficientes. </h3>"; }

  ?>
    
  