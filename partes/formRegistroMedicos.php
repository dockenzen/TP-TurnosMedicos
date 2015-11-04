
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 <script type="text/javascript">
$("#content").css("width", "500px");
</script>
<?php
session_start();
          require_once("clases/AccesoDatos.php");
          require_once("clases/especialidad.php");
$arrayEspecialidades = especialidad::TraerTodasLasEspecialidades();

if(isset($_SESSION['administrador'])){  ?>
    <div class="container">

      <form id="formRegMed" method="POST" enctype="multipart/form-data" class="form-ingreso " onsubmit="GuardarMedico(); return false;">
        <h2 class="form-ingreso-heading">Registro de Medico</h2>

        <label for="nombreMedico">Nombre del profesional</label>
                <input type="text" id="nombreMedico" class="form-control" placeholder="Nombre y Apellido" required="">
        <br>
        <!--Aca select de especialidad-->
        <label for="especialidadid">Especialidad</label>
<?php
        echo "<select id=especialidadid class='form-control'>";
        echo "<option value='0'>Seleccione la especialidad</option>";
        foreach ($arrayEspecialidades as $espe)
        {
          echo "<option value='$espe->especialidadid'>$espe->nombre</option>";
        }
        echo "</select>";
?>
        <br>
        <label for="dia">Dia</label>
        <select id="dia" class='form-control' required="">
        <option value='0'>Seleccione un dia</option>
        <option value='1'>Lunes</option>
        <option value='2'>Martes</option>
        <option value='3'>Miercoles</option>
        <option value='4'>Jueves</option>
        <option value='5'>Viernes</option>
        </select>

        <br>
        <label for="horarioEntrada" >Horario de Entrada Laboral</label>
                <input type="time" id="horarioEntrada" class="form-control" required="" >
        <br>
        <label for="horarioSalida">Horario de Salida Laboral</label>
                <input type="time" id="horarioSalida" class="form-control" required="">
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="medicoid" id="medicoid">
      </form>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>Usted no tiene permisos suficientes. </h3>"; }

  ?>
