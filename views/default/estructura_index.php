<!DOCTYPE html>
<html>
<head>
     {% include 'sections/v_head.php' %}
</head>
<body>
    <div id="contenedor">	
	     <header id="header">
	             {% include 'sections/v_header.php' %}
	     </header>	
	     <section id="cuerpo">
	            {% block contenido %}
				{% endblock %}
	     </section>
	</div> 	 
	<footer id="footer">
	        {% include 'sections/v_footer.php' %}	  
	</footer>  
</body>
</html>