<?php
		  require_once("../clases/AccesoDatos.php");
          require_once("../clases/medico.php");

          $valor = $_POST["valor"];
          $arrayHorario = medico::TraerHorariosPorMedico($valor);
?>
		<br>
		<label for="horarioConsulta">Horarios disponibles</label>
        <br>
        <select id="horarioConsulta" class='form-control' onchange="ElegirHorario()">
          <option value="0">Seleccione horario</option>"
<?php     foreach ($arrayHorario as $hora)
          {
			echo "<option value='$hora->hora'>$hora->hora</option>";
    	  }
?>
        </select>
