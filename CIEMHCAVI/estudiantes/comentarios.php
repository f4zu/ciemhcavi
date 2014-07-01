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
		<script type="text/javascript" src="../js/addComentario.js"></script>
		<script type="text/javascript" src="../js/loadcomments.js"></script>
		<script type="text/javascript" src="../js/ComentarioFotoEst.js"></script>
		<script>
		$(document).ready(function() {
				//Form Autofill
				$("#nomEst").append(localStorage.getItem('nomEst'));
				$("#cedEst").append(localStorage.getItem('cedEst'));
				$("#cedEstudiante").val(localStorage.getItem('cedEst'));
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
			<fieldset id="user_info">
					<legend>
						Comentarios al Estudiante
					</legend>
					<br />
					<img height="88px" id="fotoEst"/>
					<table>
						<tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
						<tr>
							<td><strong id="nomEst"></strong></td>
						</tr>
						<tr>
							<td><strong id="cedEst"></strong></td>
						</tr>
					</table>					
					<form  class="formConfirm"  id="comments" onsubmit="return false"  >
					<input type="text" hidden id="cedUser" value='.$_SESSION['userID'].'>
					<input type="text" hidden id="cedEstudiante"/>
						<table width="100%">
							<tr id="newComment">
								<td style="width: 650px;">
								<p class="userName">:</p>
								<textarea id="comment"  required="required" style="width: 650px; min-height: 50px; resize: vertical;"></textarea></td>
								<td align="left">
								<input  id="addComment" type="submit" value="Comentar">
								</td>
							</tr>
						</table>
					</form>
				</fieldset>
			</div>
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
