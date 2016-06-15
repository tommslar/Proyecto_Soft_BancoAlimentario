    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <link rel="stylesheet" href="../views/default/css/estilos.css">
	<script type="text/javascript" src="../views/default/js/jquery-1.11.1.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
     <title> {{ title }}</title>
<style type="text/css"> 
      html, body {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
	  #map_canvas{
	        width:80%;
			height:400px;
			margin: 5% auto;
			border:solid 3px red;
	  }
	  #coordenadas{
	        width:80%;
			height:180px;
			margin: 5% auto;
			border:solid 1px red;
			background:white;
			text-align:center;
	  }
	  #coordenadas div{
	                   margin:2% auto;
					   text-align:center;
					   
	  }
</style>
<script type="text/javascript"> 
function getCoords(marker){ 
    document.getElementById("loglat").value=marker.getPosition().lat(); 
      document.getElementById("loglong").value=marker.getPosition().lng(); 
} 
function initialize() { 
    var myLatlng = new google.maps.LatLng({{ lat }}, {{ lon }}); 
    var myOptions = { 
        zoom: 12, 
        center: myLatlng, 
        mapTypeId: google.maps.MapTypeId.ROADMAP, 
    } 
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions); 
     
   marker = new google.maps.Marker({ 
          position: myLatlng,		  
          title:"BANCO ALIMENTARIO",		  
          draggable: true 
		   
           
    }); 
    google.maps.event.addListener(marker, "dragend", function() { 
                    getCoords(marker); 
    }); 
     
      marker.setMap(map); 
    getCoords(marker); 
     
   
  } 
google.maps.event.addDomListener(window, 'load', initialize);
</script>