<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Registro y Consulta CIMHCAVI</title>
		<link href="../styles/main.css" rel="stylesheet" type="text/css"/>
		<link href="../styles/user.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
		<script type="text/javascript" src="../js/perfil.js"></script>
		<script type="text/javascript" src="../js/perfilCarrera.js"></script>
		<script type="text/javascript" src="../js/modificarCarrera.js"></script>
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
						<th id="admins"><a href="#">Administrativos</a></th>
						<th id="docentes"><a href="#">Docentes</a></th>
						<th id="estudiantes"><a href="#">Estudiantes</a></th>
						<th id="carreras"><a href="#">Carreras</a></th>
						<th id="cursos"><a href="#">Cursos</a></th>
					</table>
				</div>
			</div>

			<div class="content">
				<br />
				<fieldset id="user_info">
					<legend>
						Perfil de la Carrera:
					</legend>
					<br />
					<form class="formConfirm" id="modificarCarrera">
					<table width="100%" id="perfil">
						<tr>
							<td>Nombre:</td>
							<td>
							<input type="text" size="60" id="nombre" class="ID">
							</td>
							<td>Código:</td>
							<td>
							<input type="text" size="20" id="codigo">
							</td>
						</tr>
					</table>
					<br />';
						if($_SESSION['AllowADD']==1){
							echo '<input class="submitB" type="button" value="Modificar" id="modificarCarr"/>
							<input class="submitB" type="submit" value="Enviar Cambios" id="submit"/>';
						}
						echo '<br />
					</form>
				</fieldset>
				<br />
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
