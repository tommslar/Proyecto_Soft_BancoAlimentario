{% extends "estructura_index.php" %}
{% block contenido %}
{{ parent() }}
<header id="jumbotron"  class="jumbotron">
             <h1>Ay&uacute;danos a ayudar</h1>
</header> 
<article class="learn-more">
		 <header>
			 <h3>Lo que hacemos en el banco alimentario</h3>
	     </header>	 
		 <p>Somos una organizaci&oacute;n sin fines de lucro que tiene como misi&oacute;n la recuperaci&oacute;n de alimentos para generar conciencia ambiental combatiendo el hambre y la desnutrici&oacute;n en la zona del Gran La Plata.</p>	    
		        
</article>
<article id="learn-more" class="learn-more">
         <header>
		     <h3>Nuestro Equipo</h3>
		 </header>
		<div id="texto_presentacion">
				  <p><span class="resaltar">Nuestra Misi&oacute;n</span> es ser intermediarios sociales entre las empresas, comedores, asociaciones, y familias apoy&aacute;ndonos en nuestros valores y capacidades para combatir el hambre, la desnutrici&oacute;n y riesgos nutricionales de los m&aacute;s necesitados a trav&eacute;s del acercamiento de alimentos a los centros y la difusi&oacute;n  del buen accionar de aquellas organizaciones que nos nutren de recursos para el apoyo de nuestro fin.</p>
				  <p><span class="resaltar">Nuetra visi&oacute;n</span> es contribuir a disminuir el hambre en la Argentina y ser modelo de organizaci&oacute;n sin fines de lucro que utiliza metodolog&iacute;as, herramientas, tecnolog&iacute;as y procesos empresariales. Es por este motivo q somos Fundadores de la Red de Bancos de Alimentos, a trav&eacute;s de la cual logra donaciones, compartir mejores pr&aacute;cticas y apoyarnos mutualmente en la operaci&oacute;n diara.</p>
				  <p><span class="resaltar">Nuestros Valores</span> son esfuerzos compartidos, conciencia por el hambre y la desnutrici&oacute;n, trabajo en equipo y compromiso responsable</p>			  
		</div>	
		<div class="imagen_equipo"><img src="../views/default/images/imagen_equipo.jpg" alt="Equipo de Trabajo"></div>	
		<div class="clear"></div>
</article>
{% endblock %}