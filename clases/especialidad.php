<?php

class especialidad
{
	
	public $especialidadid;
	public $nombre;

	public static function TraerTodasLasEspecialidades()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodasLasEspecialidades()");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "especialidad");
	}

}

?>