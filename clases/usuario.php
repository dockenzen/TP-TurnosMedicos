<?php
class usuario
{
	public $usuarioid;
 	public $nombre;
  	public $correo;
  	public $clave;
  	public $foto;
  	public $sexo;
  	public $provincia;
    public $localidad;
    public $direccion;
    public $roleid;

  	public function BorrarUsuario()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarUsuario(:idd)");
				$consulta->bindValue(':idd',$this->usuarioid, PDO::PARAM_INT);
				$consulta->execute();
				return $consulta->rowCount();
	 }
	public function ModificarUsuario()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("
				CALL ModificarUsuario('$this->nombre','$this->correo','$this->clave',
					'$this->foto','$this->sexo','$this->provincia', '$this->localidad','$this->direccion',$this->usuarioid)");
			return $consulta->execute();
	 }
	 public function InsertarUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
				$consulta =$objetoAccesoDato->RetornarConsulta("
					CALL InsertarUsuario('$this->nombre','$this->correo','$this->clave','$this->foto',
						'$this->sexo','$this->provincia', '$this->localidad', '$this->direccion')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public function GuardarUsuario()
	 {
	 	if($this->usuarioid>0)
	 		{
	 			$this->ModificarUsuario();
	 		}else {
	 			$this->InsertarUsuario();
	 		}
	 }


  	public static function TraerTodosLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodosLosUsuarios()");
			$consulta->execute();
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");
	}

	public static function TraerUnUsuario($id)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnUsuario('$id')");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;
	}
	public static function TraerUnUsuarioPorCorreo($correo)
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
			$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnUsuarioPorCorreo('$correo')");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;	
	}
	public static function ValidarUsuario($usuario,$clave)
    {
    		$claveCifrada = sha1($clave);
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuario where correo = '$usuario' and clave ='$claveCifrada'");
            $consulta->execute();
            return $consulta->rowCount();
    }

	public function mostrarDatos()
	{
	  	return "Metodo mostrar:".$this->nombre."  ".$this->provincia."  ".$this->email;
	}

}
