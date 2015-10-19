<?php 
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");
	
	$arrayDeUsuarios=usuario::TraerTodosLosUsuarios();

 ?>
<script type="text/javascript">
$("#content").css("width", "900px");
</script>

<table class="table" style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Correo</th><th>Foto</th><th>Direccion</th><th>Localidad</th><th>Provincia</th><th>Ver en Mapa</th>
		</tr>
	</thead>
	<tbody>
		<?php 

foreach ($arrayDeUsuarios as $user) {
    $l = '"'.$user->provincia. '"'.',"'.$user->localidad. '"'.',"'.$user->direccion. '"'.',"'.$user->usuarioid. '"';
	echo"<tr>
			<td><a onclick='EditarUsuario($user->usuarioid)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='BorrarUsuario($user->usuarioid)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>Borrar</a></td>
			<td>$user->nombre</td>
			<td>$user->correo</td>
            <td><img src='Fotos/$user->foto'></td>
            <td>$user->direccion</td>
            <td>$user->localidad</td>
            <td>$user->provincia</td>
            <td><a onclick='VerEnMapa($l)' class='btn btn-info'>Ver en mapa</a></td>
		</tr>  ";
}		?>
	</tbody>
</table>
