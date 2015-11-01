<?php 

class consulta
{
	public $consultaid;
	public $usuarioid;
	public $medicoid;
	public $especialidadid;
	public $horarioConsulta;
	public $sintomas;

	public function InsertarConsulta()
	{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
				$consulta =$objetoAccesoDato->RetornarConsulta("
					CALL InsertarConsulta('$this->usuarioid','$this->medicoid','$this->especialidadid',
						'$this->horarioConsulta','$this->sintomas')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	public static function TraerTodasLasConsultasPorUsuario($userid)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodasLasConsultasPorUsuario($userid)");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "consulta");
	}
}
?>