<?php

  class fecha
  {
    public $fechaid;
    public $dia;

  public static function TraerDiasDelMedico($id)
  {
    $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
    $consulta =$objetoAccesoDato->RetornarConsulta("SELECT DISTINCT fecha.fechaid as fechaid, fecha.dia as dia FROM fecha INNER JOIN fechahoramedico ON fecha.fechaid = fechahoramedico.fechaid where fechahoramedico.medicoid = $id");
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS,'fecha');
  }
}
?>
