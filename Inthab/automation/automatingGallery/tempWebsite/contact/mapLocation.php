<?php

	$pageWrite = "";
	$pageWrite .= "<html>
<head>
";

$pageWrite .= "<meta name='viewport' content='initial-scale=1.0, user-scalable=no'/>
<meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
<title>Google Maps JavaScript API v3 Example: Geocoding Simple</title>
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script>
<script type='text/javascript'>
  var geocoder;
  var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();
    var latlng = new google.maps.LatLng(-34.397, 150.644);
    var myOptions = {
      zoom: 7,
      center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
    navigationControl: true,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    map = new google.maps.Map(document.getElementById(\"map_canvas\"), myOptions);
    if (geocoder) { ";
    
$file = file_get_contents('./contactText.txt', FILE_USE_INCLUDE_PATH);
$numberOfAddresses =  mb_substr_count($file, "breakForAnotherOffice") + 1; 
$addresses = explode("breakForAnotherOffice", $file);

for($count = 0; $count < $numberOfAddresses; $count++) {

$arr = preg_split ('/\r\n|\n|\r/', $addresses[$count]);

$mapAddress= "";
foreach ($arr as &$value) {
	$valueSplits1 = substr($value, 0, strpos($value, '=') - 1);
	$valueSplits2 = substr($value, strpos($value, '=') + 1);
    if($valueSplits1 === "Complex Name" || $valueSplits1 === "Landmark" || $valueSplits1 === "Road" || $valueSplits1 === "City"){
    	if($valueSplits1 !== "" || $valueSplits1 !== " " ) {
    		$mapAddress .= $valueSplits2.", ";
    	}
    }
}

$pageWrite .= "
		var address ='".$mapAddress."'; 
      geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          ";
          if($count == 0 ){
          	$pageWrite .= "map.setCenter(results[0].geometry.location);";
          }	
			$pageWrite .= "
            var infowindow = new google.maps.InfoWindow(
                { content: '<b>'+address+'</b>',
                  size: new google.maps.Size(150,50)
                });

            var marker = new google.maps.Marker({
                position: results[0].geometry.location,
                map: map, 
                title:address
            }); 
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });

          } else {
            alert(\"No results found\");
          }
        } else {
          alert(\"Geocode was not successful for the following reason: \" + status);
        }
      });
      
      ";
   }   
      $pageWrite .= "
    }
  }
</script>
</head>
<body style=\"margin:0px; padding:0px;\" onload=\"initialize()\">
 <div id=\"map_canvas\" style=\"width:100%; height:100%\">
</body>
</html>";

file_put_contents("./mapLocationPage.html", $pageWrite);

header("location:../makeChanges.php");

?>