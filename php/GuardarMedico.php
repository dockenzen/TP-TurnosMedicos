<?php
session_start();
		require_once"../clases/medico.php";
		require_once"../clases/AccesoDatos.php";

		$in = ($_POST["horarioEntrada"]);
		$hora = ($_POST['horarioSalida']);
		$in = $in.':00.';
		$hora = $hora.':00.';

        $med= new medico();
        $med->medicoid = $_POST['id'];
        $med->nombre=$_POST['nombre'];
        $med->especialidadid=$_POST['especialidadid'];
        $med->horarioEntrada=$in;
        $med->horarioSalida=$hora;
        $cantidad=$med->GuardarMedico();
		return $cantidad;
?>
