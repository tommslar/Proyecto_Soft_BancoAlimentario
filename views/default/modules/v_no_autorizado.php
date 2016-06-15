{% extends "estructura_index.php" %}
{% block contenido %}
{{ parent() }}
<article class="learn-more">
    <header>
	      <h1>{{usuario}} </h1>
	</header>
    <p> Ingreso No Autorizado </p>
</article>
{% endblock %}