<?php
session_start();
		require_once"../clases/medico.php";
		require_once"../clases/AccesoDatos.php";

		$in = ($_POST["horarioEntrada"]);
		$hora = ($_POST['horarioSalida']);
		$in = $in.':00.';
		$hora = $hora.':00.';
		$dia = $_POST['dia'];

        $med= new medico();
        $med->medicoid = $_POST['medicoid'];
        $med->nombre=$_POST['nombreMedico'];
        $med->especialidadid=$_POST['especialidadid'];
        $med->horarioEntrada=$in;
        $med->horarioSalida=$hora;
      	$cantidad=$med->GuardarMedico();

				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
				$medId = $objetoAccesoDato->RetornarUltimoIdInsertado();

return $medId;
	       $consulta = $objetoAccesoDato->RetornarConsulta("SELECT horaid FROM horario WHERE hora BETWEEN '$in' and '$hora'");
	       $consulta->execute();
	       $arrayHorario = $consulta->fetch_array();

	       foreach ($arrayHorario as $hora)
				 {
	       			$objetoAccesoDato->RetornarConsulta("INSERT INTO fechahoramedico (medicoid,horarioid,fechaid) VALUES ($medId,$hora[0],$dia)");
							$objetoAccesoDato->execute();
	       }
				 echo "Tosli";
?>
