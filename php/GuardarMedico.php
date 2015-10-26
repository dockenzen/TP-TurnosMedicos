<?php
session_start();
			require_once"../clases/medico.php";
			require_once"../clases/AccesoDatos.php";

		$in = date(($_POST["horarioEntrada"]));
		$hora =date(($_POST['horarioSalida']));
		$entrada = new DateTime($in);			
		$salida = new DateTime($hora);	
		
		$pri = date_format($entrada,'H:i:s');
		$segun = date_format($salida,'H:i:s');

		//$entrada = date_format($in,'His');
		
		//$salida = date_format($hora,'H:i:s');
		echo $pri;
		echo $segun;
        $med= new medico();
        $med->medicoid = $_POST['id'];
        $med->nombre=$_POST['nombre'];
        $med->especialidadid=$_POST['especialidadid'];
        $med->horarioEntrada=$pri;
        $med->horarioSalida=$segun;
        $cantidad=$med->GuardarMedico();
		return $cantidad;
?>
