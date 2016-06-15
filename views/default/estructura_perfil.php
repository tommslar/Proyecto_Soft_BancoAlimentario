<!DOCTYPE html>
<html>
<head>
    {% include head %}
</head>
<body>
    <div id="contenedor">	
	     <header id="header">
		        {% include 'sections/v_header_perfil.php' %}
				{% include menu %}
	     </header>	
	     <section id="cuerpo">
	            {% block contenido_perfil %}
				{% endblock %} 
	     </section>	
	</div> 	 
	<footer id="footer">
          {% include 'sections/v_footer_perfil.php' %}		  
	</footer>
	 
</body>
</html>