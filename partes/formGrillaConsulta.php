<?php
	require_once("clases/AccesoDatos.php");
	require_once("clases/consulta.php");
	require_once("clases/usuario.php");

session_start();
if(isset($_SESSION['cliente']) || isset($_SESSION['administrador']))
{

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
			<th>Paciente</th><th>Doctor</th><th>Especialidad</th><th>Dia</th><th>Horario</th><th>Motivo</th>
		</tr>
	</thead>
	<tbody>
		<?php

foreach ($arrayDeConsultas as $con)
{
	echo"
			<tr>
			<td>$con->nombre</td>
			<td>$con->medico</td>
			<td>$con->especialidad</td>
			<td>$con->dia </td>
      <td>$con->hora hs.</td>
      <td>$con->sintomas</td>
			</tr>  ";
}		?>
	</tbody>
</table>
<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>
