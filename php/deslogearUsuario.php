<?php 
session_start();

	$_SESSION['registrado']=null;
	$_SESSION['administrador']=null;
	$_SESSION['cliente']=null;

session_destroy();

 ?>