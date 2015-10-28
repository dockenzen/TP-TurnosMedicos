<?php
session_start();
			require_once"../clases/medico.php";
			require_once"../clases/AccesoDatos.php";

		$in = ($_POST["horarioEntrada"]);
		$hora = ($_POST['horarioSalida']);
		$in = $in.':00.';
		$hora = $hora.':00.';

		//$entrada = new DateTime($in);			
		//$salida = new DateTime($hora);			
		
		$pri = strtotime($in);
		$segun = strtotime($hora);
		

		$entrada = date('H:i:s',$pri);
		
		$salida = date('H:i:s',$segun);

        $med= new medico();
        $med->medicoid = $_POST['id'];
        $med->nombre=$_POST['nombre'];
        $med->especialidadid=$_POST['especialidadid'];
        $med->horarioEntrada=$entrada;
        $med->horarioSalida=$salida;
        $cantidad=$med->GuardarMedico();
		return  $cantidad;//$cantidad;
?>
