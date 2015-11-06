<?php

class medico
{
	public $medicoid;
	public $nombreMedico;
	public $especialidadid;
	public $horarioEntrada;
	public $horarioSalida;

	public function BorrarMedico()
	{
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$anteconsulta = $objetoAccesoDato->RetornarConsulta("DELETE FROM fechahoramedico WHERE medicoid = $this->medicoid");
			$anteconsulta->execute();

			$consulta = $objetoAccesoDato->RetornarConsulta("CALL BorrarMedico(:idd)");
			$consulta->bindValue(':idd',$this->medicoid, PDO::PARAM_INT);
			$consulta->execute();
			return $consulta->rowCount();
	}

	public function ModificarMedico()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("UPDATE medico SET nombreMedico='$this->nombreMedico',especialidadid='$this->especialidadid'
			,horarioEntrada='$this->horarioEntrada',horarioSalida='$this->horarioSalida' WHERE medicoid=$this->medicoid");
			return $consulta->execute();
	}
	 public function InsertarMedico()
	{
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO `medico`(`nombreMedico`, `especialidadid`, `horarioEntrada`, `horarioSalida`) VALUES ('$this->nombre','$this->especialidadid','$this->horarioEntrada','$this->horarioSalida')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
  	public static function TraerTodosLosMedicos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosMedicos()");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "medico");
	}
	public static function TraerUnMedico($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnMedico('$id')");
			$consulta->execute();
			$medicoBuscado= $consulta->fetchObject('medico');
			return $medicoBuscado;
	}
	public static function TraerTodosLosMedicosPorEspecialidad($idd)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosMedicosPorEspecialidad($idd)");
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_CLASS, "medico");
	}

	public function GuardarMedico()
	{
	 	if($this->medicoid>0)
	 	{
	 		$this->ModificarMedico();
	 	}
	 	else
	 	{
	 		return $this->InsertarMedico();
	 	}
	}


	public static function TraerEstadisticas()
    {
      $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("select count(*) as CantidadCd, nombreMedico as Cantante from medico group by nombreMedico order by CantidadCd desc limit 5");
			$consulta->execute();
      		return $consulta->fetchAll();
    }


}

?>
