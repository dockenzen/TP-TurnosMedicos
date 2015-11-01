<?php 
      require_once("../clases/AccesoDatos.php");
      require_once("../clases/usuario.php");

$email = $_POST['email'];
$respuesta = new stdClass();
if( $email != "" )
{
  $user = usuario::TraerUnUsuarioPorCorreo($email);
   if($user != null)
   {     
      $linkTemporal = generarLinkTemporal($user->usuarioid, $user->correo);
      if($linkTemporal)
      {
        enviarEmail( $email, $linkTemporal );
        $respuesta->mensaje = "<div class='alert alert-info'> Un correo ha sido enviado a su cuenta de email con las instrucciones para restablecer la contraseña </div>";
      }
   }
   else
  {
   $respuesta->mensaje = "<div class='alert alert-warning'> No existe una cuenta asociada a ese correo. </div>";
  }
}
else
{
   $respuesta->mensaje= "Debes introducir el email de la cuenta";
 }
echo json_encode($respuesta->mensaje);

function generarLinkTemporal($idusuario, $username)
{
   // Se genera una cadena para validar el cambio de contraseña
   $cadena = $idusuario.$username.rand(1,9999999).date('Y-m-d');
   $token = sha1($cadena);


  $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
        $consulta =$objetoAccesoDato->RetornarConsulta("INSERT INTO tblreseteopass (idusuario, username, token, creado) VALUES($idusuario,'$username','$token',NOW());");
        $consulta->execute();
        $resultado = $objetoAccesoDato->RetornarUltimoIdInsertado(); 
   if($resultado != 0)
   {
      $enlace = $_SERVER["SERVER_NAME"].'/php/restablecer.php?idusuario='.sha1($idusuario).'&token='.$token;
      return $enlace;
   }
   else
      return FALSE;
}
function enviarEmail($email, $link)
{
   $mensaje = '<html>
     <head>
        <title>Restablece tu contraseña</title>
     </head>
     <body>
       <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
       <p>Si hiciste esta petición, haz clic en el siguiente enlace, si no hiciste esta petición puedes ignorar este correo.</p>
       <p>
         <strong>Enlace para restablecer tu contraseña</strong><br>
         <a href="'.$link.'"> Restablecer contraseña </a>
       </p>
     </body>
    </html>';
 
   $cabeceras = 'MIME-Version: 1.0' . "\r\n";
   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   $cabeceras .= 'From Catriel: <ElReDocKenZen@hahaha.com>' . "\r\n";
   // Se envia el correo al usuario
   mail($email, "Recuperar contraseña", $mensaje, $cabeceras);
}
?>