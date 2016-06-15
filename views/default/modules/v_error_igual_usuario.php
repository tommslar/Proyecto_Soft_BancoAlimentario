{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<article class="learn-more">
    <header>
	      <h1>{{usuario}} </h1>
	</header>
    <p> El nombre de usuario que intento registrar ya existe. </p>
	<a href="javascript:history.back()" class = "volver" title="volver"> <img class="imagen_volver" src="../views/default/images/volver.png" alt="Volver"> </a>

</article>
{% endblock %}