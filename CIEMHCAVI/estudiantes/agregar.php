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
		<script type="text/javascript" src="../js/addPerson.js"></script>
		<script type="text/javascript" src="../js/loadcarrers.js"></script>
		<script src="../js/maskedinput.js" type="text/javascript"></script>
		<script src="../js/mask.js" type="text/javascript"></script>
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
						Información del Estudiante:
					</legend>
					<br />
					<p>
						Favor de llenar <strong>todos</strong> los campos marcados con un <strong></strong> que denotan la <strong>información mínima requerida</strong> para agregar un nuevo estudiante.
					</p>
					<br />
					<form class="formConfirm" method="post" action="../queries/addStudent.php" enctype="multipart/form-data">
						<table>
							<tr>
								<td align="right">Carrera:</td>
								<td id="options">
								</td>	
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">*Nombre Completo:</td>
								<td>
								<input type="text" size="18" placeholder="Nombre" required="required" id="nombre" name="nombre">
								<input type="text" size="15" placeholder="Primer Apellido"required="required" id="ape1" name="ape1">
								<input type="text" size="15" placeholder="Segundo Apellido" id="ape2" name="ape2">
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Nacionalidad:</td>

								<td>
								<select id="nacionalidad" name="nac">
    									<option>Afganistán</option>
    									<option>Albania</option>

    									<option>Alemania</option>
  									  	<option>Andorra</option>
    									<option>Angola</option>
									    <option>Anguilla</option>

									    <option>Antártida</option>
									    <option>Antigua y Barbuda</option>
									    <option>Antillas Holandesas</option>

									    <option>Arabia Saudí</option>
									    <optionArgelia</option>
									    <option>Argentina</option>
									    <option>Armenia</option>

									    <option>Aruba</option>
									    <option>Australia</option>
									    <option>Austria</option>
									    <option>Azerbaiyán</option>

									    <option>Bahamas</option>
									    <option>Bahrein</option>
									    <option>Bangladesh</option>
									    <option>Barbados</option>

									    <option>Bélgica</option>
									    <option>Belice</option>
									    <option>Benin</option>
									    <option>Bermudas</option>

									    <option>Bielorrusia</option>
									    <option>Birmania</option>
									    <option>Bolivia</option>
									    <option>Bosnia y Herzegovina</option>
									    <option>Botswana</option>
									    <option>Brasil</option>
									    <option>Brunei</option>

									    <option>Bulgaria</option>
									    <option>Burkina Faso</option>
									    <option>Burundi</option>
									    <option>Bután</option>
									    <option>Cabo Verde</option>
									    <option>Camboya</option>
									    <option>Camerún</option>
									    <option>Canadá</option>

									    <option>Chad</option>
									    <option>Chile</option>
									    <option>China</option>
									    <option>Chipre</option>
									    <option>Ciudad del Vaticano (Santa Sede)</option>
									    <option>Colombia</option>
									    <option>Comores</option>
									    <option>Congo</option>

									    <option>Congo, República Democrática del</option>
									    <option>Corea</option>
									    <option>Corea del Norte</option>
									    <option>Costa de Marfíl</option>
									    <option selected>Costa Rica</option>
									    <option>Croacia (Hrvatska)</option>
									    <option>Cuba</option>
									    <option>Dinamarca</option>

									    <option>Djibouti</option>
									    <option>Dominica</option>
									    <option>Ecuador</option>

									    <option>Egipto</option>
									    <option>El Salvador</option>
									    <option>Emiratos Árabes Unidos</option>
									    <option>Eritrea</option>
									    <option>Eslovenia</option>
									    <option>España</option>
									    <option>Estados Unidos</option>
									    <option>Estonia</option>

									    <option>Etiopía</option>
									    <option>Fiji</option>
									    <option>Filipinas</option>
									    <option>Finlandia</option>
									    <option>Francia</option>
									    <option>Gabón</option>
									    <option>Gambia</option>
									    <option>Georgia</option>

									    <option>Ghana</option>
									    <option>Gibraltar</option>
									    <option>Granada</option>
									    <option>Grecia</option>
									    <option>Groenlandia</option>
									    <option>Guadalupe</option>
									    <option>Guam</option>

									    <option>Guatemala</option>
									    <option>Guayana</option>
									    <option>Guayana Francesa</option>
									    <option>Guinea</option>
									    <option>Guinea Ecuatorial</option>
									    <option>Guinea-Bissau</option>
									    <option>Haití</option>
									    <option>Honduras</option>

									    <option>Hungría</option>
									    <option>India</option>
									    <option>Indonesia</option>
									    <option>Irak</option>
									    <option>Irán</option>
									    <option>Irlanda</option>
									    <option>Isla Bouvet</option>
									    <option>Isla de Christmas</option>

									    <option>Islandia</option>
									    <option>Islas Caimán</option>
									    <option>Islas Cook</option>
									    <option>Islas de Cocos o Keeling</option>
									    <option>Islas Faroe</option>
									    <option>Islas Heard y McDonald</option>
									    <option>Islas Malvinas</option>

									    <option>Islas Marianas del Norte</option>
									    <option>Islas Marshall</option>
									    <option>Islas menores de Estados Unidos</option>
									    <option>Islas Palau</option>
									    <option>Islas Salomón</option>
									    <option>Islas Svalbard y Jan Mayen</option>
									    <option>Islas Tokelau</option>
									    <option>Islas Turks y Caicos</option>

									    <option>Islas Vírgenes (EE.UU.)</option>
									    <option>Islas Vírgenes (Reino Unido)</option>
									    <option>Islas Wallis y Futuna</option>
									    <option>Israel</option>
									    <option>Italia</option>
									    <option>Jamaica</option>
									    <option>Japón</option>
									    <option>Jordania</option>

									    <option>Kazajistán</option>
									    <option>Kenia</option>
									    <option>Kirguizistán</option>
									    <option>Kiribati</option>
									    <option>Kuwait</option>
									    <option>Laos</option>
									    <option>Lesotho</option>
									    <option>Letonia</option>

									    <option>Líbano</option>
									    <option>Liberia</option>
									    <option>Libia</option>
									    <option>Liechtenstein</option>
									    <option>Lituania</option>
									    <option>Luxemburgo</option>
									    <option>Macedonia, Ex-República Yugoslava de</option>
									    <option>Madagascar</option>

									    <option>Malasia</option>
									    <option>Malawi</option>
									    <option>Maldivas</option>
									    <option>Malí</option>
									    <option>Malta</option>
									    <option>Marruecos</option>
									    <option>Martinica</option>

									    <option>Mauricio</option>
									    <option>Mauritania</option>
									    <option>Mayotte</option>
									    <option>México</option>
									    <option>Micronesia</option>
									    <option>Moldavia</option>
									    <option>Mónaco</option>
									    <option>Mongolia</option>

									    <option>Montserrat</option>
									    <option>Mozambique</option>
									    <option>Namibia</option>
									    <option>Nauru</option>
									    <option>Nepal</option>
									    <option>Nicaragua</option>
									    <option>Níger</option>
									    <option>Nigeria</option>

									    <option>Niue</option>
									    <option>Norfolk</option>
									    <option>Noruega</option>
									    <option>Nueva Caledonia</option>
									    <option>Nueva Zelanda</option>
									    <option>Omán</option>
									    <option>Países Bajos</option>

									    <option>Panamá</option>
									    <option>Papúa Nueva Guinea</option>
									    <option>Paquistán</option>
									    <option>Paraguay</option>
									    <option>Perú</option>
									    <option>Pitcairn</option>
									    <option>Polinesia Francesa</option>
									    <option>Polonia</option>

									    <option>Portugal</option>
									    <option>Puerto Rico</option>
									    <option>Qatar</option>
									    <option>Reino Unido</option>
									    <option>República Centroafricana</option>
									    <option>República Checa</option>
									    <option>República de Sudáfrica</option>
									    <option>República Dominicana</option>

									    <option>República Eslovaca</option>
									    <option>Reunión</option>
									    <option>Ruanda</option>
									    <option>Rumania</option>
									    <option>Rusia</option>
									    <option>Sahara Occidental</option>
									    <option>Saint Kitts y Nevis</option>
									    <option>Samoa</option>

									    <option>Samoa Americana</option>
									    <option>San Marino</option>
									    <option>San Vicente y Granadinas</option>
									    <option>Santa Helena</option>
									    <option>Santa Lucía</option>
									    <option>Santo Tomé y Príncipe</option>
									    <option>Senegal</option>

									    <option>Seychelles</option>
									    <option>Sierra Leona</option>
									    <option>Singapur</option>
									    <option>Siria</option>
									    <option>Somalia</option>
									    <option>Sri Lanka</option>
									    <option>St. Pierre y Miquelon</option>
									    <option>Suazilandia</option>

									    <option>Sudán</option>
									    <option>Suecia</option>
									    <option>Suiza</option>
									    <option>Surinam</option>
									    <option>Tailandia</option>
									    <option>Taiwán</option>
									    <option>Tanzania</option>
									    <option>Tayikistán</option>

									    <option>Territorios franceses del Sur</option>
									    <option>Timor Oriental</option>
									    <option>Togo</option>
									    <option>Tonga</option>
									    <option>Trinidad y Tobago</option>
									    <option>Túnez</option>
									    <option>Turkmenistán</option>

									    <option>Turquía</option>
									    <option>Tuvalu</option>
									    <option>Ucrania</option>
									    <option>Uganda</option>
									    <option>Uruguay</option>
									    <option>Uzbekistán</option>
									    <option>Vanuatu</option>
									    <option>Venezuela</option>

									    <option>Vietnam</option>
									    <option>Yemen</option>
									    <option>Yugoslavia</option>
									    <option>Zambia</option>
									    <option>Zimbabue</option>
    							</select>
								</td>

							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">*Cédula:</td>
								<td>
								<input type="text" size="35" required="required" id="cedula" name="ced">
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Número de Carnet:</td>
								<td>
								<input type="text" size="35" id="carnet" name="carnet">
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Año de Ingreso:</td>
								<td>
								<input type="number" size="35" id="anioIngreso" name="anioIngreso" pattern="^\d{4}">
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Correo Electrónico:</td>
								<td>
								<input type="email" size="35" id="email" name="email">
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">*Género:</td>
								<td>
								<input type="radio" name="genero" value="masculino" required="required">
								Masculino
								<br />
								<input type="radio" name="genero" value="femenino" required="required">
								Femenino</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>

								<td align="right">Tipo de Sangre:</td>
								<td>
								<select class="unselected" name="blood">
									<option value="">Seleccione uno...</option>
									<option>O-</option>
									<option>O+</option>
									<option>A-</option>
									<option>A+</option>
									<option>B-</option>
									<option>B+</option>
									<option>AB-</option>
									<option>AB+</option>
								</select></td>

							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">*Fecha de Nacimiento:</td>
								<td>
								<input type="text" id="fechaNac" required="required" pattern="^(0[1-9]|[12][0-9]|3[01])[ /](0[1-9]|1[012])[/](19|20)\d\d$" name="fecha"/><font size="1">(formato: dd/mm/aaaa)</font>
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Dirección en Tiempo Lectivo:</td>
								<td>
								<select class="unselected" name="provinciaCiclo">
									<option value="">Seleccione una...</option>
									<option>Heredia</option>
									<option>San José</option>
									<option>Alajuela</option>
									<option>Cartago</option>
									<option>Puntarenas</option>
									<option>Limón</option>
									<option>Guanacaste</option>
								</select>
								<input type="text" placeholder="Canton" size="17" name="cantonCiclo">
								<input type="text" placeholder="Distrito" size="18" name="distritoCiclo"><br />
								<input type="text" placeholder="Otras Señas" size="54"name="otrasCiclo"/>
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Dirección en Tiempo <strong>no</strong> Lectivo:</td>
								<td>
								<select class="unselected" name="provinciaNoCiclo">
									<option value="">Seleccione una...</option>
									<option>Heredia</option>
									<option>San José</option>
									<option>Alajuela</option>
									<option>Cartago</option>
									<option>Puntarenas</option>
									<option>Limón</option>
									<option>Guanacaste</option>
								</select>
								<input type="text" placeholder="Canton" size="17" name="cantonNoCiclo">
								<input type="text" placeholder="Distrito" size="18" name="distritoNoCiclo"><br />
								<input type="text" placeholder="Otras Señas" size="54" name="otrasNoCiclo"/>
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Lugar de trabajo:</td>
								<td>
								<input type="text" size="38" name="LugTrabajo"/>
								</td>
							</tr>
							<tr>
								<td align="right">Dirección de trabajo:</td>
								<td>
								<select class="unselected" name="provinciaWork">
									<option value="">Seleccione una...</option>
									<option>Heredia</option>
									<option>San José</option>
									<option>Alajuela</option>
									<option>Cartago</option>
									<option>Puntarenas</option>
									<option>Limón</option>
									<option>Guanacaste</option>
								</select>
								<input type="text" placeholder="Canton" size="17" name="cantonWork">
								<input type="text" placeholder="Distrito" size="18" name="distritoWork"><br />
								<input type="text" placeholder="Otras Señas" size="54" name="otrosWork"/>
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Teléfonos:</td>
								<td>
								<input type="tel" size="15" class="phone" placeholder="Habitación"  name="telfRoom">
								<input type="tel" size="16" class="phone" placeholder="Celular"  name="telfCel">
								<input type="tel" size="16" class="phone" placeholder="Trabajo"  name="telfWork">
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr id="emergencyTel1">
								<td align="right">Emergencias Contactar a:</td>
								<td>
								<input type="text" size="34" placeholder="Nombre" name="EmergencyContact[]"/>
								<input type="tel" size="16" class="phone" placeholder="Telefono" name="TelfEmergency[]"/>
								</td>
								<td>
									<input id="addEmergencyTel" type="button" value="Agregar">
								</td>
								<td>
									<input id="remEmergencyTel" type="button" value="Remover" >
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr id="enfermedad1">
								<td align="right">Enfermedades:</td>
								<td>
								<input type="text" size="54" name="sick[]"/>
								</td>
								<td>
									<input id="addEnfermedad" type="button" value="Agregar">
								</td>
								<td>
									<input id="remEnfermedad" type="button" value="Remover" >
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr id="alergia1">
								<td align="right">Alergias:</td>
								<td>
								<input type="text" size="54" name="alergy[]"/>
								</td>
								<td>
									<input id="addAlergia" type="button" value="Agregar">
								</td>
								<td>
									<input id="remAlergia" type="button" value="Remover" >
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr id="lesion1">
								<td align="right">Lesiones:</td>
								<td>
								<input type="text" size="54" name="lesion[]"/>
								</td>
								<td>
									<input id="addLesion" type="button" value="Agregar">
								</td>
								<td>
									<input id="remLesion" type="button" value="Remover" >
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr id="necesidad1">
								<td align="right">Necesidades especiales:</td>
								<td>
								<input type="text" size="54" name="need[]"/>
								</td>
								<td>
									<input id="addNecesidad" type="button" value="Agregar">
								</td>
								<td>
									<input id="remNecesidad" type="button" value="Remover" >
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr id="medicamento1">
								<td align="right">Medicamentos que toma:</td>
								<td>
								<input type="text" size="54" name="meds[]"/>
								</td>
								<td>
									<input id="addMedicamento" type="button" value="Agregar">
								</td>
								<td>
									<input id="remMedicamento" type="button" value="Remover" >
								</td>
							</tr>
							<tr><td><br /></td></tr>
							<tr>
								<td align="right">Foto:</td>
								<td><input type="file" name="photo"/></td>
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
		}else{
		echo "<h1>¡Error, no tienes permisos para ver esta pagina, por favor inicia sesion en el sistema poder ver los contenidos!</h1>";
		}

		?>
		
	</body>
	<footer id="copyright">
		(c) Copyright 2014 Universidad Nacional de Costa Rica. Todos los Derechos Reservados.
	</footer>
</html>
