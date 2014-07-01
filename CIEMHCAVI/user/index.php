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
		<script type="text/javascript" src="../js/user.js"></script>
		<script src="../js/maskedinput.js" type="text/javascript"></script>
		<script src="../js/mask.js" type="text/javascript"></script>
		<script type="text/javascript" src="../js/perfilInfoUsuario.js"></script>
		<script type="text/javascript" src="../js/perfilUsuario.js"></script>
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
										<a href="#">Actualizar Información</a>
									</li>
									<li>
										<a href="../index.html" style="padding-right: 150px;" id="salir">Salir</a>
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
						Información de Usuario:
					</legend>
					<br />
					<img id="img_infoUser"  height="88px"/>
					<form id="userInfo" class="formConfirm">
						<table>
							<tr>
								<td>Usuario:</td>
								<td>
								<input id="usuarioCed" type="text" size="35" readonly="readonly" required="required" value="'.$_SESSION['userID'].'" />
								</td>
							</tr>
							<tr>
								<td>Contraseña:</td>
								<td>
								<input type="password" size="35" required="required" id="password">
								</td>
							</tr>
							<tr>
								<td>Confirmar Contraseña:</td>
								<td>
								<input type="password" size="35" required="required" id="repassword">
								</td>
							</tr>
							
						</table>
						<br />
						<input class="submitB" type="submit" value="Guardar Cambios"/>
						<input class="resets" type="reset" value="Restablecer"/>
					</form>
					<br />
				</fieldset>

				<br />
				<br />

				<fieldset id="pers_info">
					<legend>
						Información Personal:
					</legend>
					<br />
					<form id="infoPersonal" class="formConfirm" action="../queries/modificarInfoPersonal.php" method="post" enctype="multipart/form-data">
						<table>
							<tr>
								<td align="right">Nombre Completo:</td>
								<td>
								<input type="text" size="18" placeholder="Nombre" required="required" id="nombre" name="nombre">
								<input type="text" size="15" placeholder="Primer Apellido"required="required" id="ape1" name="ape1">
								<input type="text" size="15" placeholder="Segundo Apellido" id="ape2" name="ape2">
								</td>
							</tr>
							<tr>
								<td align="right">Cédula:</td>
								<td>
								<input id="InfoCed" type="text" size="35" name="ced" required="required" readonly="readonly" value="'.$_SESSION['userID'].'" >
								</td>
							</tr>
							<tr>
								<td align="right">Correo:</td>
								<td>
								<input id="usuarioCorreo" type="email" size="35" name="correo">
								</td>
							</tr>
							<tr>
								<td align="right">Género:</td>
								<td>
								<input type="radio" id="masculino" name="genero" value="masculino" required="required">
								Masculino
								<br />
								<input type="radio" id="femenino" name="genero" value="femenino" required="required">
								Femenino</td>
							<tr>
								<td align="right">Fecha de Nacimiento:</td>
								<td>
								<input type="text" required="required" id="fechaNac" pattern="^(0[1-9]|[12][0-9]|3[01])[ /](0[1-9]|1[012])[/](19|20)\d\d$" name="fecha"/><font size="1">(formato: dd/mm/aaaa)</font>
								</td>
							</tr>
							<tr>
								<td align="right">Teléfono:</td>
								<td>
								<input type="tel" id="telf" name="telf">
								</td>
							</tr>
							<tr>
								<td align="right">Dirección:</td>
								<td>
								<select id="provincia" class="unselected" name="provincia">
									<option value="">Seleccione una...</option>
									<option>Heredia</option>
									<option>San José</option>
									<option>Alajuela</option>
									<option>Cartago</option>
									<option>Puntarenas</option>
									<option>Limón</option>
									<option>Guanacaste</option>
								</select>
								<input type="text" placeholder="Canton" size="17" id="canton" name="canton">
								<input type="text" placeholder="Distrito" size="18" id="distrito" name="distrito"><br />
								<input type="text" placeholder="Otras Señas" size="54" id="otras" name="otras"/>
								</td>
							</tr>
							<tr>
								<td align="right">Foto:</td>
								<td><input type="file" name="photo"/></td>
							</tr>
						</table>
						<br />
						<input class="submitB" type="submit" value="Guardar Cambios"/>
					</form>
					<br />
				</fieldset>
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
