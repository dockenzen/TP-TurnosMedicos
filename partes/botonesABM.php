<?php 
session_start();
if(isset($_SESSION['administrador']))
{
	echo "<section class='widget'><center><h2> Bienvenido: ". $_SESSION['administrador']."</h2></center>";

 ?>
		
			<h4 class="widgettitle"><center>Administracion</center></h4>
			<ul>
				<li><a onclick="Mostrar('MostrarGrilla')" class=" btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-th">&nbsp;</span>Grilla Usuarios</a></li>
				<li><a onclick="Mostrar('MostrarFormAltaMedicos')" class="btn-lg MiBotonUTN" ><span class="glyphicon glyphicon-plus-sign">&nbsp;</span>Alta Profesionales</a></li>
			
			</ul>
		</section>

<?php 
}
else
	{
		echo "<section class='widget'>
			<h4 class='widgettitle'>No estas registrado</h4></section>";
	}
?>