<?php
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");
require_once("clases/especialidad.php");
require_once("clases/medico.php");
require_once("clases/consulta.php");


$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'registro':
		include("partes/formRegistro.php");
		break;
	case 'desloguear':
			include("php/deslogearUsuario.php");
		break;
	case 'MostrarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'Estadisticas':
			include("partes/estadisticas.php");
		break;
	case 'MostrarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formRegistro.php");
		break;
	case 'MostrarFormConsulta':
			include("partes/formConsulta.php");
		break;
    case 'VerEnMapa':
        	include("partes/formMapa.php");
		break;
	/*	En Revision
		case 'restablecer':
        	include("php/restablecer.php");
        	*/
		break;
	case 'BorrarUsuario':
			$user = usuario::TraerUnUsuario($_POST['id']);
			$pick = $user->foto;
			$ruta=getcwd();  //ruta directorio actual
    		$ruta=$ruta."\\imagenes\\Fotos\\".$user->foto
    		;
			if (is_file($ruta))
			{
				unlink($ruta);
			}
			$cantidad=$user->BorrarUsuario();
			echo $cantidad;
		break;
	case 'GuardarUsuario':
			include("php/GuardarUsuario.php");
   		break;
	case 'GuardarConsulta':
	var_dump($_POST);
			$consu = new consulta();
			$consu->sintomas=$_POST['sintoma'];
			$consu->especialidadid=$_POST['espeId'];
			$consu->medicoid=$_POST['medId'];
			$consu->usuarioid=$_POST['usuarioid'];
			$consu->horarioConsulta=$_POST['horarioFinal'];
			$consu->fechaid=$_POST['fechaid'];
			$reto = $consu->InsertarConsulta();
			return $reto;
   		break;
	case 'TraerUsuario':
			$user = usuario::TraerUnUsuario($_POST['id']);
			echo json_encode($user);
		break;
	case 'TraerMedico':
			$medico = medico::TraerUnMedico($_POST['id']);
			echo json_encode($medico);
		break;
    case 'guardarMarcadores':
        session_start();
        if(isset($_POST["marcadores"]))
        {
            $filename = "ArchivosTxt/marcadores" . getdate()[0] . ".txt";

            $_SESSION['file'] = $filename;
            $puntos = $_POST["marcadores"];

            $file = fopen($filename, "w");

            foreach ($puntos as $valor)
            {
                $lat =  $valor["lat"];
                $lng =  $valor["lng"];
                $nombre =  $valor["nombre"];
                fwrite($file, $lat.">".$lng.">".$nombre . PHP_EOL);
            }
        fclose($file);

        echo "Marcadores guardados con exito";
        }
        else
            echo "No ingreso marcador/es a guardar";
        break;
    case 'MostrarFormAltaMedicos':
		include("partes/formRegistroMedicos.php");
	break;
	case 'MostrarGrillaMedicos':
		include("partes/formGrillaMedicos.php");
	break;
	case 'GuardarMedico':
   		include("php/GuardarMedico.php");
   break;
   case 'MostrarGrillaConsulta':
		include("partes/formGrillaConsulta.php");
	break;
	case 'BorrarMedico':
		$user = medico::TraerUnMedico($_POST['id']);
		$cantidad=$user->BorrarMedico();
		echo $cantidad;
		break;
    case 'olvidoContra':
    	include("partes/olvidoPass.php");
    break;
	 case 'horariosMedico':
			include("partes/horariosMedico.php");
		break;
		
	default:
		# code...
		break;
}

 ?>
