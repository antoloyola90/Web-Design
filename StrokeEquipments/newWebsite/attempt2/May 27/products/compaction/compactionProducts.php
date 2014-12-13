<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="utf-8">

		<!-- Add jQuery library -->
		<script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>

		<!-- Add fancyBox -->
		<link rel='stylesheet' href='../../source/jquery.fancybox.css?v=2.1.5' type='text/css' media='screen' />
		<script type='text/javascript' src='../../source/jquery.fancybox.pack.js?v=2.1.5'></script>

		
<style>	
	img.greyToColor{
    //filter: url(filters.svg#grayscale); /* Firefox 3.5+ */
    //filter: gray; /* IE5+ */
    //-webkit-filter: grayscale(0); /* Webkit Nightlies & Chrome Canary */
    -webkit-transition: all .5s ease-in-out;
    width:120px;
	height:120px;
}
img.greyToColor:hover {
    //filter: none;
    //-webkit-filter: grayscale(1);
    -webkit-transform: scale(1.3);
}

a:link {text-decoration:none;}
	a:visited {text-decoration:none;}
	a:hover {text-decoration:underline;}
	a:active {text-decoration:none;}
	
</style>

<script type='text/javascript'>
			$(document).ready(function() {
								
				  
				
				$('.various').fancybox({
					maxWidth	: 800,
					maxHeight	: 600,
					fitToView	: true,
					width		: '100%',
					height		: '100%',
					autoSize	: false,
					closeClick	: false,
					openEffect	: 'elastic',
					closeEffect	: 'fade'
				});
				$('.various2').fancybox({
					maxWidth	: 800,
					maxHeight	: 600,
					fitToView	: true,
					width		: '45%',
					height		: '70%',
					minWidth 	: 200,
					minHeight   : 300,
					autoSize	: false,
					closeClick	: false,
					openEffect	: 'elastic',
					closeEffect	: 'fade'
				});
				$('.fancybox').fancybox({
					openEffect	: 'elastic',
					closeEffect	: 'fade',
					width		: '90%',
					height		: '100%'
				});
			});
			
			
		</script>
		
			
</head>

<body>

<h2>Compaction Products</h2>

<?php
$totalNumberOfProducts = 8;

echo "<table width='100%'>\n";
echo "<tr>";
for($cnt = 1; $cnt <= 4; $cnt++){ 
	
	$file = file_get_contents('./details/'.$cnt.'.txt', FILE_USE_INCLUDE_PATH);
	
	$arr = preg_split ('/\r\n|\n|\r/', $file);

	foreach ($arr as &$value) {
		if(strpos($value, 'Product') === 0){
			$value1 = substr($value, 0, strpos($value, '-') - 1);
			$value2 = substr($value, strpos($value, '-') + 1);
			$productName = $value2;
		}
	}

	
	echo "<td align='center' width='25%' bgcolor='#E6E6E6'>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."'>
				<h3 style='color:black'>".$productName."</h3>
				</a>
			</td>";

} 
echo "</tr>";
echo "<tr>";
for($cnt = 1; $cnt <= 4; $cnt++){ 
	
	echo "<td align='center' width='25%' bgcolor='#F2F2F2'>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."'>
				<img class='greyToColor'  src='./images/".$cnt.".jpg' alt='".$productName."'/>
				</a>
			</td>";

} 
echo "</tr>";
echo "<tr>";
for($cnt = 1; $cnt <= 4; $cnt++){ 
	
	
	$file = file_get_contents('./details/'.$cnt.'.txt', FILE_USE_INCLUDE_PATH);
	
	$arr = preg_split ('/\r\n|\n|\r/', $file);

	foreach ($arr as &$value) {
		if(strpos($value, 'Part Number') === 0){
			$value1 = substr($value, 0, strpos($value, '-') - 1);
			$value2 = substr($value, strpos($value, '-') + 1);
			$partNumber = $value2;
		}
	}
	
	echo "<td align='center' width='25%' bgcolor='#E6E6E6'>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."'>
				<h4 style='color:black'>".$partNumber."</h4></a>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."' style='color:#FFFF00'>
				More...</a>
			</td>";
	

} 
echo "</tr>";
	echo "</table>\n";


	
echo "<table width='100%'>\n";
echo "<tr>";
for($cnt = 5; $cnt <= 8; $cnt++){ 
	
	$file = file_get_contents('./details/'.$cnt.'.txt', FILE_USE_INCLUDE_PATH);
	
	$arr = preg_split ('/\r\n|\n|\r/', $file);

	foreach ($arr as &$value) {
		if(strpos($value, 'Product') === 0){
			$value1 = substr($value, 0, strpos($value, '-') - 1);
			$value2 = substr($value, strpos($value, '-') + 1);
			$productName = $value2;
		}
	}

	
	echo "<td align='center' width='25%' bgcolor='#E6E6E6'>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."'><h3 style='color:black'>".$productName."</h3></a>
			</td>";

} 
echo "</tr>";
echo "<tr>";
for($cnt = 5; $cnt <= 8; $cnt++){ 
	
	echo "<td align='center' width='25%' bgcolor='#F2F2F2'>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."'>
				<img class='greyToColor'  src='./images/".$cnt.".jpg' alt='".$productName."'/>
				</a>
			</td>";

} 
echo "</tr>";
echo "<tr>";
for($cnt = 5; $cnt <= 8; $cnt++){ 
	
	
	$file = file_get_contents('./details/'.$cnt.'.txt', FILE_USE_INCLUDE_PATH);
	
	$arr = preg_split ('/\r\n|\n|\r/', $file);

	foreach ($arr as &$value) {
		if(strpos($value, 'Part Number') === 0){
			$value1 = substr($value, 0, strpos($value, '-') - 1);
			$value2 = substr($value, strpos($value, '-') + 1);
			$partNumber = $value2;
		}
	}
	
	echo "<td align='center' width='25%' bgcolor='#E6E6E6'>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."'>
				<h4 style='color:black'>".$partNumber."</h4></a>
				<a class='various fancybox.iframe' href='./productDetails.php?productNumber=".$cnt."' style='color:#FFFF00'>
				More...</a>
			</td>";
	

} 
echo "</tr>";
	echo "</table>\n";	
	
?>	

	
</body>
</html>