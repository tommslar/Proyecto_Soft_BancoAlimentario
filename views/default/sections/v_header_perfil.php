<div id= "log" >
    {% if perfil == 'administrador' %}
     <a id="configuracion" href="../controller/c_configuraciones.php" title="configuracion del sistema"> <img id "imagen_configuracion" src="../views/default/images/configuracion.png" alt="imagen configuracion"></a>
	 {% endif %}
     <ul id="list_datos">	     
	     <li>Bienvenido al Sistema <a href="../controller/c_logout.php">(Cerrar Sesi&oacute;n)</a></li>
		 <li>{{ perfil }}</li>
		 <li><a id="home" href="../controller/c_home.php">{{ nomyape }}</a></li>
     </ul>
</div>
     
<div id="imag" >
      <img id="imlogo" src="http://bancoalimentario.org.ar/wp-content/uploads/2013/12/logo_web.jpg" alt="Logo Banco Alimentario De La Plata"> 
</div>