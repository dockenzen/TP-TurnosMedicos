<?php
		  		require_once("../clases/AccesoDatos.php");
          require_once("../clases/medico.php");
					require_once("../clases/horario.php");

          $valor = $_POST["valor"];
          $InOut = medico::TraerHorarioDelMedico($valor);
					$entrada = $InOut->horarioEntrada;
					$salida = $InOut->horarioSalida;

					$arrayHorario = horario::TraerTodosLosHorarios($entrada,$salida);
?>
				<br>
				<label for="horarioConsulta">Horarios disponibles</label>
        <br>

				<select id="horarioConsulta" class='form-control' onchange="ElegirHorario()">
          <option value="0">Seleccione horario</option>"
<?php   foreach ($arrayHorario as $hora)
        {
					echo "<option value='$hora->horaid'>$hora->hora</option>";
    	  }
?>
        </select>
