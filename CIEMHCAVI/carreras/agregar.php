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
		<script type="text/javascript" src="../js/addCarrera.js"></script>
		<script>
			$(document).ready(function() {
				//Form Autofill
				$("#nombre").val(localStorage.getItem('nombre'));
				$("#codigo").val(localStorage.getItem('codigo'));
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
				<fieldset>
					<legend>
						Información de Carrera:
					</legend>
					<br />
					<p>
						Favor de llenar <strong>todos</strong> los campos marcados con un <strong></strong> que denotan la <strong>información mínima requerida</strong> para agregar una nueva carrera.
					</p>
					<br />
					<form class="formConfirm" id="addCarrera">
						<table>
							<tr>
								<td>*Nombre:</td>
								<td>
								<input type="text" size="35" required="required" id="nombre">
								</td>
							</tr>
							<tr>
								<td>*Código:</td>
								<td>
								<input type="text" size="35" required="required" id="codigo">
								</td>
							</tr>
						</table>
						<br />
						<input class="submitB" type="submit" value="Enviar Cambios"/>
						<input class="resets" type="reset" value="Restablecer"/>
					</form>
					<br />
				</fieldset>
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