<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registro y Consulta CIMHCAVI</title>
		<link href="../styles/main.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
		<script type="text/javascript" src="../js/searchAdmin.js"></script>
		<script>
		$(document).ready(function() {
				//Form Autofill
				localStorage.clear();
		});
		</script>
	</head>
	<body>
		<?php
		if(isset($_SESSION['userID'])&& !empty($_SESSION['userID'])){
			echo '<div class="page" >
			<div class="header">
				<div id="logos">
					<img src="../imgs/UNA.jpg" alt="logo UNA"/>
					<img src="../imgs/CIMHCAVI.png" alt="logo CIMHCAVI"/>
				</div>
				<div id="user">
					<table>
						<td>
						<ul>
							<li>
								<strong id="user_name">'.$_SESSION['userName'].' '.$_SESSION['userApe1'].'</strong>
								<input type="text" hidden id="cedulaUsuario" value='.$_SESSION['userID'].'>
								<input type="text" hidden id="UsuarioFoto" value='.$_SESSION['userFoto'].'>
								<ul>
									<li>
										<a href="#"  id="userName">Actualizar Información</a>
									</li>
									<li>
										<a href="#" style="padding-right: 150px;" id="salir">Salir</a>
									</li>
								</ul>
							</li>
						</ul></td>
						<td><img id="img_user" /></td>
					</table>
				</div>
				<div id="nav">
					<table>
						<th id="actual"><a href="#">Administrativos</a></th>
						<th id="docentes"><a href="#">Docentes</a></th>
						<th id="estudiantes"><a href="#">Estudiantes</a></th>
						<th id="carreras"><a href="#">Carreras</a></th>
						<th id="cursos"><a href="#">Cursos</a></th>

					</table>
				</div>
			</div>

			<div class="content">
				<br />
				<fieldset id="search">
					<legend>
						Búsqueda de Administrativos
					</legend>
					<form>
						<br />
						<table width="100%">
							<tr>
								<td align="right">Nombre Completo:</td>
								<td>
								<input type="text" size="16" placeholder="Nombre" id="nombre">
								<input type="text" size="16" placeholder="Primer Apellido" id="ape1">
								<input type="text" size="16" placeholder="Segundo Apellido" id="ape2">
								</td>
								<td align="right">Cédula:</td>
								<td align="left">
								<input type="text" id="cedula"/>
								</td>
							</tr>
						</table>
						<br />';
						if($_SESSION['AllowADD']==1){
							echo '<input class="addSearch" type="button" value="Agregar Nuevo" id="addSearch"/>';
						}
						echo '</form>
				</fieldset>
				<br />
				<div id="tableResults"></div>
				<table id="searchTable" class="results" width="100%"><tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Cédula</th><th>Correo</th><th>Teléfono</th></tr>
				</table>
			</div>
			<br />
		</div>';
		} else {
			echo "<h1>¡Error, no tienes permisos para ver esta pagina, por favor inicia sesion en el sistema poder ver los contenidos!</h1>";
		}
		?>
	</body>
	<footer id="copyright">
		(c) Copyright 2014 Universidad Nacional de Costa Rica. Todos los Derechos Reservados.
	</footer>
</html>