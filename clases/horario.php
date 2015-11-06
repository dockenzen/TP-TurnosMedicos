	<?php

class horario
{

	public $horaid;
  public $hora;

  public static function TraerTodosLosHorarios($in,$hora)
  {
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
    $consulta = $objetoAccesoDato->RetornarConsulta("SELECT * FROM horario WHERE hora BETWEEN '$in' and '$hora'");
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, "horario");
  }
	public static function TraerHorarioDelMedico($id,$dia)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta =$objetoAccesoDato->RetornarConsulta("SELECT horaid as horaid,hora as hora FROM horario INNER JOIN fechahoramedico ON horario.horaid = fechahoramedico.horarioid where fechahoramedico.medicoid = $id and fechahoramedico.fechaid = $dia");
		$consulta->execute();
		return $consulta->fetchAll(PDO::FETCH_CLASS, "horario");
	}

}

?>
