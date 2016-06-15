<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
<link rel="stylesheet" href="../views/default/css/estilos.css">
<script type="text/javascript" src="../views/default/js/jquery-1.11.1.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=weather"></script>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta charset="UTF-8">
 <title> {{ title }}</title>
<style>
      #clima{
	        background:white;
			height:210px;
			border: 2px solid orange;
			text-align:center;
			font-size:12px;
	  }
	  #panel {
        position: absolute;
        top: 5px;
        left: 50%;
        margin-left: -180px;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
      }
      #directions-panel {
        height: 100%;
        float: right;
        width: 300px;
        overflow: auto;
		margin: 5% auto;
		background:white;
      }

      #map_canvas {
        height:600px;
		margin: 5% auto;
      }

      #control {
        background: #fff;
        padding: 5px;
        font-size: 14px;
        font-family: Arial;
        border: 1px solid #ccc;
        box-shadow: 0 2px 2px rgba(33, 33, 33, 0.4);
        display: none;
      }

      @media print {
        #map_canvas {
          height: 500px;
          margin: 0;
        }

        #directions-panel {
          float: none;
          width: auto;
        }
      }
    </style>
