<?php 
session_start();
if(isset($_SESSION['administrador']))
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/medico.php");
	
	$arrayDeMedicos=medico::TraerTodosLosMedicos();

 ?>
<script type="text/javascript">
$("#content").css("width", "1000px");
</script>

<table class="table" style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Especialidad</th><th>Horario de entrada</th><th>Horario de salida</th>
		</tr>
	</thead>
	<tbody>
		<?php 

foreach ($arrayDeMedicos as $med) {
  //  $l = '"'.$user->provincia. '"'.',"'.$user->direccion. '"'.',"'.$user->localidad. '"'.',"'.$user->usuarioid. '"';
	echo"<tr>
			<td><a onclick='EditarUsuario($med->medicoid)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='BorrarUsuario($med->medicoid)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
			<td>$med->nombreMedico</td>
			<td>$med->nombre</td>
            <td>$med->horarioEntrada</td>
            <td>$med->horarioSalida</td>
		</tr>  ";
}		?>
	</tbody>
</table>
<?php 	}else	{
		echo "<h4 class='widgettitle'>No estas registrado</h4>";
	}

	 ?>