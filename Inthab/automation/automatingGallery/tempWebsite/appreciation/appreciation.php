<?php
if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../../loginForm.php");
}

	$pageWrite = "";
	$pageWrite .= "
	<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<style>
	body
	{
		color:#fff;
	}
	</style>
</head>
<body>

 <p align='center'>
 
	";
	
	$file = file_get_contents('./appreciationText.txt', FILE_USE_INCLUDE_PATH);
 
 $arr = preg_split ('/\r\n|\n|\r/', $file);

$bold= "";
foreach ($arr as &$value) {
	list ($value1, $value2) = split(" = ", $value);
	if($value1 === "Bold"){ 
    	$pageWrite .= "<p style='font-size:20px' align='center'><b>".$value2."</b></p><ul>\n";
    }
    else if($value1 === "Break"){ 
    	$pageWrite .= "<br/>";
    }
    else if($value1 === "Award"){
    	$pageWrite .= "<li>".$value2."&nbsp;&nbsp;\n";
    }
    else if($value1 === "Link" && $value2 !== ""){
    	$pageWrite .= "<a href='".$value2."' target='_TOP'> 
    	<img src='./link.png' width='15' height='15'/></a></li>\n";
    }		
    
}

$pageWrite .= "</ul>
</p>

</body>
</html>";

file_put_contents("./appreciationPage.html", $pageWrite);

header("location:../gallery/createGallery.php");
?>