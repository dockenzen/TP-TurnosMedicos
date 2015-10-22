
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
session_start();
if(!isset($_SESSION['registrado'])){  ?>
    <div id="formLogin" class="container">
      <form  class="form-ingreso " onsubmit="validarLogin();return false;">
        <h2 class="form-ingreso-heading">Ingrese su E-Mail</h2>
        <label for="correo" class="sr-only">Correo</label>
                <input type="text" id="correo" class="form-control" placeholder="E-Mail" required="" autofocus="" value="<?php  if(isset($_COOKIE["correo"])){echo $_COOKIE["correo"];}?>">
        <label for="clave" class="sr-only">Contraseña</label>
                <input type="text" id="clave" class="form-control" placeholder="Password" required="" autofocus="" value="<?php  if(isset($_COOKIE["clave"])){echo $_COOKIE["clave"];}?>">
        <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme" checked> Recordame
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>
      <a onclick="Mostrar('olvidoContra')">Olvido su contraseña?</a>



    </div> <!-- /container -->

  <?php }else{    echo"<h3>usted '".$_SESSION['registrado']."' esta logeado. </h3>";?>         
    <button onclick="deslogear()" class="btn btn-lg btn-danger btn-block" type="button"><span class="glyphicon glyphicon-off">&nbsp;</span>Deslogearme</button>
 <script type="text/javascript">
 MostrarBotones();</script>
  <?php  }  ?>
    
  
