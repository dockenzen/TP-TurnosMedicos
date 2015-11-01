<?php
	require_once("../clases/AccesoDatos.php");
	require_once("../clases/usuario.php");
session_start();

$correo = $_POST['correo'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

if(usuario::ValidarUsuario($correo,$clave))
{	
	if($recordar=="true")
	{
		setcookie("correo",$correo, time()+36000 , '/');		
	}

	$arrayDeUsuarios=usuario::TraerTodosLosUsuarios();
	foreach ($arrayDeUsuarios as $user) 
	{
		if($user->correo == $correo)
		{
			if(is_null($user->roleid))
			{
				$retorno ="No cuenta con un rol definido dentro de la pagina";
			}				
			else
				if($user->roleid == 1)
				{
					$_SESSION['administrador']=$user->nombre;
					$retorno="ingreso";
				}
				else
				{
					$_SESSION['cliente']=$user->nombre;
					$retorno="ingreso";
				}			
		}
	}	
	$_SESSION['registrado'] = $correo;
}
else
{
	$retorno="no esta en la base de datos";
}
echo $retorno;
?>