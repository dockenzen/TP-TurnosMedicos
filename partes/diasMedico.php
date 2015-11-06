<?php
		  require_once("../clases/AccesoDatos.php");
      require_once("../clases/medico.php");
			require_once("../clases/horario.php");
			require_once("../clases/fecha.php");


			//valor de medicoid
      $medicoid = $_POST["valor"];
      //echo $valor;
      $dias = fecha::TraerDiasDelMedico($medicoid);
?>
		  <br>
		  <label for="dia">Dias que el doctor atiende</label>
      <br>
			<select id="dia" class='form-control' onclick='ElegirDia()'>
				<option value="0">Seleccione un dia</option>"
<?php     foreach ($dias as $dia)
          {
						echo "<option value='$dia->fechaid'>$dia->dia</option>";
    	    }

?>
</select>
