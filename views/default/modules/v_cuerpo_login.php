{% extends "estructura_index.php" %}
{% block contenido %}
{{ parent() }}
<header class="header_login">
				 <img class="imagen_login" src="../views/default/images/imagen_login.png" alt="Login">
</header>

<div id="div_login">
<form id="login" action="../controller/c_controlar_ingreso.php" method="POST">			     
         <div><input type="text" id="nombreusuario" name="nombreusuario" value="" placeholder=" Usuario" required></div>					
         <div><input type="password" id="password" name="password" value="" placeholder=" Contrase&ntilde;a" required></div>	 
         <div id="ingresar"><input type="submit" class="boton_ingresar" name="login" value="Login"></div>
</form>
</div>
{% endblock %}