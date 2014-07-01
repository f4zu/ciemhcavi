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
                <script type="text/javascript" src="../js/loadcarrers.js"></script>
                <script type="text/javascript" src="../js/perfilCurso.js"></script>
		<script type="text/javascript" src="../js/modificarCurso.js"></script>
		<script type="text/javascript" src="../js/deleteCurso.js"></script>
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
						Perfil del Curso:
					</legend>
					<form class="formConfirm" id="modificarCurso">
					<br />
					<table width="100%" id="perfil">
						<tr>
							<td align="right">Carrera:</td>
							<td id="options" align="left">
							</td>
						</tr>
						<tr>
							<td align="right">Nombre:</td>
							<td align="left">
							<input type="text" size="58" id="nombre"class="ID"/>
							</td>
						</tr>
						<tr>
							<td align="right">Código:</td>
							<td align="left">
							<input type="text" size="10" id="codigo"/>
							</td>
						</tr>
						<tr>
							<td align="right">Tipo:</td>
							<td align="left">
							<select id="tipo">
								<option value="">Seleccione uno...</option>
								<option>Teórico</option>
								<option>Práctico</option>
								<option>Teórico/Práctico</option>
							</select>
							</td>
						</tr>
						<tr>
							<td align="right">Ciclo:</td>
							<td align="left">
							<select id="ciclo" required="required">
								<option value="">Seleccione uno...</option>
								<option>1er Semestre</option>
								<option>2do Semestre</option>
								<option>1er Cuatrimestre</option>
								<option>2do Cuatrimestre</option>
								<option>3er Cuatrimestre</option>
							</select>
							</td>
						</tr>
						<tr>
							<td align="right">Creditos:</td>
							<td align="left">
							<input type="number" id="creditos" size="35" required="required" id="creditos" pattern="^\d{1,2}">
							</td>
						</tr>
					</table>
					<br />';
						if($_SESSION['AllowADD']==1){
							echo '<input class="submitB" type="button" value="Modificar" id="modificarCur"/>
							<input class="submitB" type="submit" value="Enviar Cambios" id="submit"/>';
							if($_SESSION['AllowDEL']==1){
								echo '<input class="resets" type="button" value="Eliminar" id="delete"/>';
							}
						}
						echo '<br />
					</form>
				</fieldset>
				<br />
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
