<article class="learn-more">
    <header>
	      <h1> Nuestra informacion </h1>
		  
		  
{% for key, val in json %}
   {% if val is iterable %}
	     <p> {{key}}</p>
   {% else %}
          <p> {{key}} {{val}}</p>
   {% endif %}	
{% endfor %}

	
	</header>
</article>

