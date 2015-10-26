<?php 
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");
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
	case 'MostrarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formRegistro.php");
		break;
    case 'VerEnMapa':
        	include("partes/formMapa.php");
		break;
	case 'BorrarUsuario':
			$user = new usuario();
			$user->usuarioid=$_POST['id'];
			$cantidad=$user->BorrarUsuario();
			echo $cantidad;
		break;
	case 'GuardarUsuario':
			include("php/GuardarUsuario.php");
   		break;
	case 'TraerUsuario':
			$user = usuario::TraerUnUsuario($_POST['id']);
			echo json_encode($user);
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
    case 'olvidoContra':
    	include("partes/olvidoPass.php");
    break;


	default:
		# code...
		break;
}

 ?>
