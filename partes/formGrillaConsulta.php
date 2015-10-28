<?php 
session_start();
if(isset($_SESSION['cliente']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/consulta.php");
	require_once("clases/usuario.php");

	$user = usuario::TraerUnUsuarioPorCorreo($_SESSION['registrado']);

	$id = $user->usuarioid;

	$arrayDeConsultas=consulta::TraerTodasLasConsultasPorUsuario($id);

 ?>
<script type="text/javascript">
$("#content").css("width", "1000px");
</script>

<table class="table" style=" background-color: beige;">
	<thead>
		<tr>
			<th>Paciente</th><th>Doctor</th><th>Especialidad</th><th>Horario</th><th>Motivo</th>
		</tr>
	</thead>
	<tbody>
		<?php 

foreach ($arrayDeConsultas as $con) {
  //  $l = '"'.$user->provincia. '"'.',"'.$user->direccion. '"'.',"'.$user->localidad. '"'.',"'.$user->usuarioid. '"';
	echo"<tr>
			<td>$con->nombre</td>
			<td>$med->nombreMedico</td>
			<td>$med->especialidad</td>
            <td>$med->horarioConsulta</td>
            <td>$med->sintomas</td>
		</tr>  ";
}		?>
	</tbody>
</table>
<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>