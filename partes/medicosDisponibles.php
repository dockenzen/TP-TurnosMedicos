<?php

		  require_once("../clases/AccesoDatos.php");
          require_once("../clases/medico.php");

          $valor = $_POST["valor"];
          $arrayMedicos = medico::TraerTodosLosMedicosPorEspecialidad($valor);
?>
		<br>
		<label for="medico">Medicos disponibles</label>
        <br>
        <select id="medico" class='form-control' onclick='ElegirMedico()'>
          <option value="0">Seleccione un Doctor</option>"
<?php     foreach ($arrayMedicos as $medi)
          {
			echo "<option value='$medi->medicoid'>$medi->nombreMedico</option>";
    	  }
?>
        </select>
