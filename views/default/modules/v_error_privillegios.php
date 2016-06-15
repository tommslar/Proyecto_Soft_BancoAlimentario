{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
<article class="learn-more">
    <header>
	      <h1>{{usuario}} </h1>
	</header>
    <p> Ud. no tiene permisos para acceder a esta sección. </p>
</article>
{% endblock %}