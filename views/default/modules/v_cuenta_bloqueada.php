{% extends "estructura_index.php" %}
{% block contenido %}
{{ parent() }}
<article class="learn-more">
    <header>
	      <h1> Su cuenta se encuentra bloqueada </h1>
		  <h2>{{ usuario }}</h2>
	</header>
    <p> Por el momento  no es posible ingresar al sistema</p>
</article>
{% endblock %}