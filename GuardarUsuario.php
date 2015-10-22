<?php
session_start();
require_once"clases/usuario.php";
require_once"clases/AccesoDatos.php";

        $pass = $_POST['clave'];
        //echo $_POST['foto'];
        $email = $_POST['correo'];
        $ruta=getcwd();  //ruta directorio actual
        $rutaDestino=$ruta."\\imagenes\\Fotos\\";
    	$NOMEXT=explode(".", $_FILES['fichero0']['name']);
        $EXT=end($NOMEXT);
        $nomarch=$NOMEXT[0].".".$EXT;  // no olvidar el "." separador de nombre/ext
        $rutaActual = $ruta."\\imagenes\\FotosTemp\\".$nomarch;
        $nuevoNombreDeFoto = $email.".".$EXT;
        //Renombro con el email/usuario
        rename($rutaActual,$ruta."\\imagenes\\FotosTemp\\".$nuevoNombreDeFoto);
//        rename ($ruta."\\imagenes\\FotosTemp\\".$nomarch,$ruta."\\imagenes\\FotosTemp\\".$nuevoNombreDeFoto);
        $rutaActual = $ruta."\\imagenes\\FotosTemp\\".$nuevoNombreDeFoto;

        //Muevo a carpeta Fotos
		rename($rutaActual,$rutaDestino.$nuevoNombreDeFoto);
        //
        echo $_POST['sexo'];

        $usuario= new usuario();
        $usuario->usuarioid = $_POST['id'];
        $usuario->correo=$email;
        $usuario->nombre=$_POST['nombre'];
        $cifrado = sha1($pass);
        $usuario->clave=$cifrado;
        $usuario->sexo=$_POST['sexo'];
        $usuario->provincia=$_POST['provincia'];
        $usuario->direccion=$_POST['direccion'];
        $usuario->localidad=$_POST['localidad'];
        $usuario->foto=$nuevoNombreDeFoto;
        $cantidad=$usuario->GuardarUsuario();
		return $cantidad;
?>