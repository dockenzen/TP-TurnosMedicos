<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

<script type="text/javascript">
$("#container").css("width", "400px");
</script>

<div class="container" id="container">
<form id="frmRestablecer" onsubmit="validarEmail();return false;" method="post">
  <div class="panel panel-default">
    <div class="panel-heading"> Restaurar contraseña </div>
     <div class="panel-body">
      <div class="form-group">
        <label for="email"> Escribe el email asociado a tu cuenta para recuperar tu contraseña </label>
        <input type="email" id="email" class="form-control" name="email" required>
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" value="Recuperar contraseña" >
      </div>
    </div>
  </div>
</form>
 </div>
<div id="mensaje"></div>