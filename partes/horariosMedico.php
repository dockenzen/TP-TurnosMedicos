<?php
		  require_once("../clases/AccesoDatos.php");
      require_once("../clases/medico.php");

      //retornar ultimo id insertado
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
      $valor = $objetoAccesoDato->RetornarUltimoIdInsertado();
      //$valor = $_POST["valor"];
      //echo $valor;
       $vari = medico::TraerHorarioDelMedico($valor);
       $entrada = $vari[0];//11
       $salida = $vari[1];//22

       $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM horario WHERE hora BETWEEN '$entrada' and '$salida'");
       $consulta->execute();
       $arrayHorario = $consulta->fetch_array();


       for ($i=0; $i < $salida; $i++)
       {
         $arrayHorario = $entrada+i;
       }

?>
		  <br>
		  <label for="hora">Horarios disponibles</label>
      <br>
      <form id="formHorario" method="POST" enctype="multipart/form-data" class="form-ingreso " onsubmit="GuardarHorario(); return false;">
<?php     foreach ($arrayHorario as $hora)
          {
			         echo "<input type='checkbox' id=hora name=hora value='$hora->horaid' checked disabled>$hora->hora</br>";
    	    }

?>    <input type="submit" value="Confirmar Horarios"/>
      </form>
