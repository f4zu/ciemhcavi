<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registro y Consulta CIMHCAVI</title>
		<link href="../styles/main.css" rel="stylesheet" type="text/css"/>
		<link href="../styles/admin.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
		<script type="text/javascript" src="../js/searchCurse.js"></script>
		<script type="text/javascript" src="../js/loadcarrers.js"></script>
	</head>
	<body>
	<?php
		if(isset($_SESSION['userID'])&& !empty($_SESSION['userID'])){

		echo '
		<div class="page" >
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
						<th id="admins"><a href="#">Administrativos</a></th>
						<th id="docentes"><a href="#">Docentes</a></th>
						<th id="estudiantes"><a href="#">Estudiantes</a></th>
						<th id="carreras"><a href="#">Carreras</a></th>
						<th id="actual"><a href="#">Cursos</a></th>
					</table>
				</div>
			</div>

			<div class="content">
				<br />
				<fieldset id="search">
					<legend>
						Búsqueda de Cursos
					</legend>
					<form id="curseSearch">
						<br />
						<table width="100%">
							<tr>
								<td align="right">Nombre:</td>
								<td align="left">
								<input type="text" id="nombre" size="60"/>
								</td>
								<td align="right">Código:</td>
								<td align="left">
								<input type="text" size="18" id="codigo"/>
								</td>
								<td align="right">Creditos:</td>
								<td align="left">
								<input type="number"  id="creditos"/>
							</tr>
							<tr>
								<td align="right">Carrera:</td>
								<td id="options" align="left">
								</td>
								<td align="right">Tipo:</td>
								<td align="left">
								<select id="tipo" style="width: 150px" class="unselected">
									<option value="">Seleccione uno...</option>
									<option value="Teórico">Teórico</option>
									<option value="Práctico">Práctico</option>
									<option value="Teórico/Práctico">Teórico/Práctico</option>
								</select></td>
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
				<table id="searchTable" class="results" width="100%"><tr><th>Nombre</th><th>Código</th><th>Tipo</th><th>Creditos</th><th>Carrera</th></tr>
				</table>
			</div>
			<br />
		</div>';
		}else{
		echo "<h1>¡Error, no tienes permisos para ver esta pagina, por favor inicia sesion en el sistema poder ver los contenidos!</h1>";
		}

		?>
	</body>
	<footer id="copyright">
		(c) Copyright 2014 Universidad Nacional de Costa Rica. Todos los Derechos Reservados.
	</footer>
</html>
