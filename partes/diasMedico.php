<?php
		  require_once("../clases/AccesoDatos.php");
      require_once("../clases/medico.php");
			require_once("../clases/horario.php");

			//valor de medicoid
      $medicoid = $_POST["valor"];
      //echo $valor;
       $dias = medico::TraerDiasDelMedico($medicoid);

       $arrayHorario = horario::TraerTodosLosHorarios($entrada,$hora);
       $consulta->execute();
			 "SELECT fechaid FROM fechahoramedico WHERE fechaid = $dias AND medicoid = medicoid";
?>
		  <br>
		  <label for="hora">Dias que el doctor atiende</label>
      <br>
      <form id="formHorario" method="POST" enctype="multipart/form-data" class="form-ingreso " onsubmit="ElegirDia(); return false;">
<?php     foreach ($arrayHorario as $hora)
          {
			         echo "<input type='checkbox' id=hora name=hora value='$hora->horaid' >$hora->hora</br>";
    	    }

?>    <input type="submit" value="Confirmar Horarios"/>
      </form>
