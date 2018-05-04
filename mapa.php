<?php

$mapa=substr($_POST["name"], 5);
$code=$_POST["code"];


define("CODE", $code);
require_once("ext.php");
	
			$goo=str_replace(" ","+", $mapa);
			
			$data =json_decode( file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=".$goo."&key=AIzaSyAIc0bHsiqMsR6vclDJ3GNmGrdb3rGHtsg"), true );


$ext=new ext();
$ext->val_enlase();
		$data_ext =json_decode( file_get_contents($ext->val_enlase()), true );

		$cont_ext=count($data_ext["result"]);


$claves=array_rand($data_ext['result'],1);
$ids=$data_ext['result'][$claves]["taxonid"];
$wiki=str_replace(" ","_", $data_ext['result'][$claves]["scientific_name"]);

$matriz=[
		"posi"=>$data["results"][0]["geometry"]["location"],
		"mapa"=>$mapa,
		"ext"=>$cont_ext,
		"wiki"=>$wiki
		
	];


$ifor_ext =json_decode(file_get_contents("http://apiv3.iucnredlist.org/api/v3/species/citation/id/".$ids."?token=91ce64bae8516aa63a985b446c9d4288ea92ea7f9717a83941c76f3fb6ef3ca9"), true );

$infor=json_encode($data_ext['result'][$claves]);



$matrizJS=json_encode($matriz);
$data_ext=$ifor_ext['result'][0]['citation'];

?>
    <style>
      #map {
        width: 100%;
        height: 800px;
        background-color: grey;
      }
    </style>

 <div id="map"></div>

<script type="text/javascript">
	 
	var matriz = <?php echo $matrizJS; ?>;
	var info=<?php echo $infor; ?>;
	var infoext="<?php echo $data_ext; ?>";

function initMap() {
		
 		console.log(matriz);
        var pos = {lat:matriz["posi"]["lat"], lng:matriz["posi"]["lng"] };

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: pos
        });

        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});

          var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">'+info["scientific_name"]+'</h1>'+
      '<div id="bodyContent">'+
      '<p>Categoria:'+info["category"]+'<br/>'+
      'informacion: '+infoext+'</p>'+
      '<p> <a href="https://en.wikipedia.org/w/index.php?title='+matriz["wiki"]+'">'+
      'https://en.wikipedia.org/w/index.php?title='+matriz["wiki"]+'</a></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
    content: contentString
  });

  var marker = new google.maps.Marker({
    position: pos,
    map: map,
    title: matriz["wiki"],
    icon:"http://localhost/nuevo/m1.png"
  });
  marker.addListener('click', function() {
    infowindow.open(map, marker);
  });


      }

        var locations = [
      <?php
       $c=0;
       for($i=0;$i<$cont_ext;$i++){
       		if($c==$cont_ext-1){
       			?>
       			{lat:matriz["posi"]["lat"], lng:matriz["posi"]["lng"] }
       			<?php
       		}else{
       			?>
       			{lat:matriz["posi"]["lat"], lng:matriz["posi"]["lng"] },
       			<?php
       		}
       }
      ?>
      ]
    </script>

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>


 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxOln1mXJuLA0uykwiTOassXus5W_AWGc&callback=initMap">
    </script>
