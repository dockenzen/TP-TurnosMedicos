<?php
session_start();
		require_once"../clases/medico.php";
		require_once"../clases/AccesoDatos.php";
		require_once"../clases/horario.php";
		require_once"../clases/fechahoramedico.php";

		$in = ($_POST["horarioEntrada"]);
		$hora = ($_POST['horarioSalida']);
		$in = $in.':00.';
		$hora = $hora.':00.';
		$dia = $_POST['dia'];

        $med= new medico();
				if(isset($_POST['medicoid']))
				{
        	$med->medicoid = $_POST['medicoid'];
				}
        $med->nombre=$_POST['nombreMedico'];
        $med->especialidadid=$_POST['especialidadid'];
        $med->horarioEntrada=$in;
        $med->horarioSalida=$hora;
      	$medId = $med->GuardarMedico();
				//que me traiga el ultimo id insertado lpm !"$&#$!

		$arrayHorario = horario::TraerTodosLosHorarios($in,$hora);

	       foreach ($arrayHorario as $hora)
	  	   {
				fechahoramedico::InsertarFechaHoraMedico($medId,$hora->horaid,$dia);
	       }
	       echo $medId;
?>
