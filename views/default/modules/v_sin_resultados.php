{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<article class ="mensaje">
    <header>
	      <h1>SIN RESULTADOS</h1>
	</header>
    <p> No Se Encontraron resultados </p>
	<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>

</article>
{% endblock %}
