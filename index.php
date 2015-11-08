<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- disable iPhone inital scale -->
<meta name="viewport" content=" initial-scale=1.0">

<title>Gestion de turnos</title>

<!-- main css -->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/media-queries.css" rel="stylesheet" type="text/css">
<link href="css/ingreso.css" rel="stylesheet">

<!-- media queries css -->
 <link rel="stylesheet" href="bower_components/bootstrap-css/css/bootstrap.min.css">

 <script src="bower_components/jquery/dist/jquery.min.js"></script>



<script type="text/javascript" src="js/funcionesAjax.js"></script>
<script type="text/javascript" src="js/funcionesLogin.js"></script>
<script type="text/javascript" src="js/funcionesABM.js"></script>
<script type="text/javascript" src="js/funcionesMapa.js"></script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="js/moduloGeolocalizacion.js"></script>
<script type="text/javascript" src="js/geolocalizacionCommon.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


</head>

<body onload="TraerNoticias()">

<?php
session_start();

?>

<div id="pagewrap">

	<header id="header">

		<hgroup>
			<h1 id="site-logo"><a href="#">Pami para programadores</a></h1>
			<h2 id="site-description">Un lugar igual a otros, solo que mas lindo.</h2>
		</hgroup>
		<section class="widget widClima">
			<div id="clima">
				
			</div>			
		</section>

		<nav>
			<ul id="main-nav" class="clearfix">
				<li><a onclick="MostrarLogin()" class="btn">Ingreso</a></li>
				<li><a onclick="Mostrar('registro')" class="btn">Registro</a> </li>				
				<li><a onclick="Mostrar('MostrarFormConsulta')" class="btn">Gestion de Consultas</a> </li>
				<li><a onclick="Mostrar('MostrarGrillaConsulta')" class="btn">Su historial de Consultas</a> </li>				
				<li><a onclick="Mostrar('MostrarGrillaMedicos')" class="btn">Listado de Doctores</a> </li>				
				<li><a valign="right" onclick="deslogear()" class="btn">Desloguearse</a> </li>
				
			</ul>
			<!-- /#main-nav --> 
		</nav>

		<form id="searchform">
			
		</form>

	</header>
	<!-- /#header -->
	
	<div id="content" >

		<article  class="post clearfix">

			<header  >
				<h1 class="post-title"><a href="#">Trabajo practico - Turnos Medicos</a></h1>
				<p class="post-meta"><time class="post-date" datetime="2015-18-10" pubdate>2015</time> <em>en</em> <a href="#">Berazachussets</a></p>
			</header>
			<hr>
			<div id="principal">
<?php
/*	En Revision
			if(isset($_GET['token']) && isset($_GET['idusuario']))
				RestablecerPass($_GET['token'],$_GET['idusuario'])
*/
?>
			</div>		

		</article>
		<!-- /.post -->

	</div>
	<!-- /#content --> 
	
	<aside id="sidebar">

		<div id="botonesABM">
				<!--contenido dinamico cargado por ajax-->
		</div>
		<!-- /.widget -->

		<section class="widget clearfix" >
			<h4 class="widgettitle">Informe</h4>
				<div id="informe">
				<!--contenido dinamico cargado por ajax-->
				</div>
			
		</section>
		<!-- /.widget -->
						
	</aside>
	<!-- /#sidebar -->
	<div id="content2">
			<label><H1><u>En las noticias !</u></H1></label>
				<div  class="noti" id="noticias"  vertical-align="text-top">

				</div>
			
	</div>

	<footer id="footer">
			<label> Powered by El Dockenzen </label>
	</footer>
	<!-- /#footer --> 
	
</div>
<!-- /#pagewrap -->

</body>
</html>
