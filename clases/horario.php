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

}

?>
