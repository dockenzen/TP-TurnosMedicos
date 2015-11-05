<?php

class fechahoramedico
{

  public $fechahoramedicoid;
  public $fechaid;
  public $horarioid;
  public $medicoid;

  public static function InsertarFechaHoraMedico($medId,$horaid,$dia)
  {
       $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
       $objetoAccesoDato->RetornarConsulta("INSERT INTO fechahoramedico (medicoid,horarioid,fechaid) VALUES ($medId,$horaid,$dia)");
       $consulta->execute();
  }
}
?>
