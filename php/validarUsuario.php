<?php

session_start();
$correo = $_POST['correo'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

if(usuario::ValidarUsuario($correo,$clave))
{
	if($recordar=="true")
	{
		setcookie("correo",$correo, time()+36000 , '/');		
		setcookie("clave",$clave, time()+36000 , '/');		
	}
	$_SESSION['registrado']=$correo;
	$retorno="ingreso";
}
else
{
	$retorno="no esta en la base de datos";
}
echo $retorno;
?>