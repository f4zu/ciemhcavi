<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">    
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Registro y Consulta CIMHCAVI</title>
        <link href="styles/main.css" rel="stylesheet" type="text/css"/>
        <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script type="text/javascript" src="js/changepass.js"></script>
    </head>
    <body>
        <?php
        if(isset($_SESSION['userID'])&& !empty($_SESSION['userID'])){
            echo '<div class="page" >
            <div class="header">
                <div id="logos">
                    <img src="imgs/UNA.jpg" alt="logo UNA"/>
                    <img src="imgs/CIMHCAVI.png" alt="logo CIMHCAVI"/>
                </div>
                <div class="content">
                <br />
                <fieldset id="search">
                    <legend>
                    Primer Ingreso al Sistema por favor cambie su clave
                    </legend>
                    <form id="changePassword">
                        <br />
                        <input type="text" value="'.$_SESSION['userID'].'" hidden id="userId">
                        <table width="100%">
                            <tr>
                            <td align="right">Actual Clave:</td>
                            <td><input type="password" required="required" size="16" id="current"></td>
                            </tr>
                            <tr>
                            <td align="right">Nueva Clave:</td>
                            <td><input type="password" required="required" size="16" id="nueva"></td>
                            </tr>
                            <tr>
                            <td align="right">Confirme Clave Nueva:</td>
                            <td><input type="password" required="required" size="16" id="confirm"></td>
                            </tr>
                            <tr>
                            <td align="right"></td>
                            <td><input class="addSearch" type="submit" value="Enviar" id="change"/></td>
                            </tr>
                        </table>
                        <br/>
                    </form>
                </div>
            </div>
            </div>';
        }
        else
        {
            echo "<h1>¡Error, no tienes permisos para ver esta pagina, por favor inicia sesion en el sistema poder ver los contenidos!</h1>";
        }
        ?>
    </body>
    <footer id="copyright">
        (c) Copyright 2014 Universidad Nacional de Costa Rica. Todos los Derechos Reservados.
    </footer>
</html>

