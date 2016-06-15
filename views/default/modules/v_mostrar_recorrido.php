{% extends "estructura_perfil.php" %}
{% block contenido_perfil %}
{{ parent() }}
   
<script>
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom: 12,
    center: new google.maps.LatLng({{lat_banco}}, {{long_banco}})
  };
  var map = new google.maps.Map(document.getElementById('map_canvas'),
      mapOptions);
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById('directions-panel'));

  var control = document.getElementById('control');
  control.style.display = 'block';
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(control);
  
    var weatherLayer = new google.maps.weather.WeatherLayer({
    temperatureUnits: google.maps.weather.TemperatureUnit.FAHRENHEIT
  });
  weatherLayer.setMap(map);

  var cloudLayer = new google.maps.weather.CloudLayer();
  cloudLayer.setMap(map);
  calcRoute();
}

function calcRoute() {
  var start = new google.maps.LatLng({{lat_banco}}, {{long_banco}})
  var end = new google.maps.LatLng({{lat_er}}, {{long_er}})
  var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.TravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
  
   
}


google.maps.event.addDomListener(window, 'load', initialize);



    </script>
<div id="recorrido">
<h3>RECORRIDO </h3>
      <div id="clima">
	       <h2>INFORMACION DEL CLIMA</h2>
			   <h2>Pais: {{country}}"</h2>
               <h3>Ciudad: {{ciudad}} [lat = {{lat}} , lon = {{lon}}  ]</h3>
                <b>Estado del cielo: </b>"{{estado_cielo}}"<br>
                <b>Descripción: </b>{{descripcion}}<br>
                <br>
                <b>Temperatura: </b>{{temp}} K [Máx: {{tempmax}} K, Mín: {{tempmin}}K]<br>
                <b>Presión: </b>{{presion}}<br>
                <b>Humedad: </b>{{humedad}}<br>
	 </div>
   <div id="panel">
     <div id="control">
	 <div>
      <span>Inicio (Banco Alimentario)</span>
      <span id="inicio">calle 7 y 125, 1923 Ensenada Berisso, Buenos Aires, Argentina</span>
	  </div>
	  <div>
	  <span>Fin (Entidad Receptora)</span>
	  <span id="fin">{{domicilio_er}}</span>
	  </div>
    </div>
  </div>
	<div id="directions-panel"></div>
    <div id="map_canvas"></div>
	
	
</div>
{% endblock %}