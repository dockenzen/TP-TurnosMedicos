
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php 
 
//session_start();
//if(isset($_SESSION['registrado'])){  ?>
    <div class="container">

      <form id="formReg" enctype="multipart/form-data" class="form-ingreso " onsubmit="GuardarUsuario(); return false;">
        <h2 class="form-ingreso-heading">Registro de usuario</h2>
        <label for="nombre" class="sr-only" hidden>Nombre</label>
                <input type="text" id="nombre" class="form-control" placeholder="Nombre" required="" autofocus="">
        <label for="correo" class="sr-only" hidden>Correo</label>
                <input type="text" id="correo" class="form-control" placeholder="Correo" required="" autofocus="">
        <label for="clave" class="sr-only" hidden>Contraseña</label>
                <input type="text" id="clave" class="form-control" placeholder="Contraseña" required="" autofocus="">
        <label for="provincia" class="sr-only" hidden>Provincia</label>
                <input type="text" id="provincia" class="form-control" placeholder="Provincia" required="" autofocus="">
        <label for="localidad" class="sr-only" hidden>Localidad</label>
                <input type="text" id="localidad" class="form-control" placeholder="Localidad" required="" autofocus="">
        <label for="direccion" class="sr-only" hidden>Direccion</label>
                <input type="text" id="direccion" class="form-control" placeholder="Direccion" required="" autofocus="">            
        <br>
        <label for="foto" class="sr-only" hidden>Foto</label>
                <input type="file" id="foto" class="form-control" placeholder="Foto" required="" autofocus="">                                    
        <br>
          <label>
            <input type="radio" Name="sexo" id="sexo" value="M" checked>Masculino
            <input type="radio" Name="sexo" id="sexo" value="F">Femenino
          </label>
          
        <button class="btn btn-lg btn-primary btn-block" type="submit">Guardar</button>
        <input type="hidden" name="id" id="id" readonly>
      </form>



    </div> <!-- /container -->

  <?php //}else{    echo"<h3>usted no esta logeado. </h3>"; }

  ?>
    
  
