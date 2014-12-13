<!DOCTYPE html>
<html>
<head>
	
	<style>
	body
	{
		background:black;
		color:white;
		font-size:16px;
	}


	</style>
	
</head>

<body>
<?php 

$completeToPrint = "";

$productNumber = $_GET['productNumber'];

$file = file_get_contents('./details/'.$productNumber.'.txt', FILE_USE_INCLUDE_PATH);
 
 $arr = preg_split ('/\r\n|\n|\r/', $file);

$processDoing = "";
 
 foreach ($arr as &$value) {
	if(strpos($value, 'Product') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$completeToPrint .= "<h3 align='left'>".$value2."</h3>\n";
	}
	else if(strpos($value, 'Part Number') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$completeToPrint .= "<h4 align='left'>".$value2."</h4>\n";
	}
	
    
}
	$completeToPrint .=  "<table width='100%'>\n";
	$completeToPrint .= "<tr>\n";
	$completeToPrint .= "<td align='left'>\n";
		$completeToPrint .= "<img src='./images/".$productNumber.".jpg' alt='Walk Behind roller MMAL 31'  width='200px' height='200px'/>\n";
	$completeToPrint .= "</td>";
	
	$completeToPrint .= "<td align='right'>";

 
  foreach ($arr as &$value) {
	if(strpos($value, 'Unique Features') === 0){
		$completeToPrint .=  "<h5 align='left'>".$value."</h5>\n";
		$processDoing = "Unique Features";
		$completeToPrint .=  "<ul>\n";
	}
	if(strpos($value, 'point') === 0 && strpos($processDoing, 'Unique Features') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$completeToPrint .=  "<li align='left'>".$value2."</li>\n";
	}
	if(strpos($value, 'Features End') === 0 && strpos($processDoing, 'Unique Features') === 0){
		$processDoing = "";
		$completeToPrint .=  "</ul>\n";
		//echo "<br/><br/>\n";
	}
	
	if(strpos($value, 'Applications') === 0 && strpos($value, 'Applications End') !== 0){
		$completeToPrint .=  "<h5 align='left'>".$value."</h5>\n";
		$processDoing = "Applications";
		$completeToPrint .=  "<ul>\n";
	}
	if(strpos($value, 'point') === 0 && strpos($processDoing, 'Applications') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$completeToPrint .=  "<li align='left'>".$value2."</li>\n";
	}
	if(strpos($value, 'Applications End') === 0 && strpos($processDoing, 'Applications') === 0){
		$processDoing = "";
		$completeToPrint .=  "</ul>\n";
	}
   
}
 
	$completeToPrint .= "</td>\n";
	$completeToPrint .= "</tr>\n";
	$completeToPrint .= "</table>\n";

 
  foreach ($arr as &$value) {
	if(strpos($value, 'table heading') === 0){
		$value1 = substr($value, 0, strpos($value, ':') - 1);
		$value2 = substr($value, strpos($value, ':') + 1);
		$completeToPrint .=  "<h5 align='left'>".$value2."</h5>\n";
		$completeToPrint .=  "<table width='100%' border='1'>\n";
		$processDoing = "table heading";
	}
	if(strpos($value, 'point') === 0 && strpos($processDoing, 'table heading') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		
		$value3 = substr($value2, 0, strpos($value2, ',') - 1);
		$value4 = substr($value2, strpos($value2, ',') + 1);
		
		$completeToPrint .=  "<tr>\n<td>\n".$value3."</td>\n";
		$value5 = substr($value4, 0, strpos($value4, '=') - 1);
		$value6 = substr($value4, strpos($value4, '=') + 1);
		
		$completeToPrint .=  "<td>".$value6."</td>\n</tr>\n";
	}
	if(strpos($value, 'table end') === 0 && strpos($processDoing, 'table heading') === 0){
		$processDoing = "";
		$completeToPrint .=  "</table>\n";
		//echo "<br/><br/>\n";
	}	
}
	setcookie("completeToPrint", $completeToPrint, time()+300);
	echo "<a href='./createPdf.php?productNumber=".$productNumber."'>Pdf</a>";
	echo $completeToPrint;
	?>
</body>
 
</html>
 