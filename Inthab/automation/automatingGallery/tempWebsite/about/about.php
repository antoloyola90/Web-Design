<?php
if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../../loginForm.php");
}

	$pageWrite = "";
	$pageWrite .= "<!DOCTYPE html>
	<html>
	<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	<style>
	body
	{
		color:black;
		text-align:center;
		font-size:16px;
	}


	</style>
	
	<script type='text/javascript'>
	function changeBackground(){
				document.body.style.backgroundImage=\"url('./aboutPageImage.jpg')\";
	}
	</script>
	
</head>

<body onload=\"changeBackground()\">
	";
	
	$file = file_get_contents('./aboutText.txt', FILE_USE_INCLUDE_PATH);
 
 $arr = preg_split ('/\r\n|\n|\r/', $file);

$bold= "";
foreach ($arr as &$value) {
	list ($value1, $value2) = split(" = ", $value);
	if($value1 === "Bold"){ 
    	$pageWrite .= "<span align='center'><b>".$value2."</b></span>\n";
    }
    else if($value1 === "Break"){ 
    	$pageWrite .= "<br/>";
    }
    else{
    	$pageWrite .= "<span>".$value2."</span>\n";
    }	
    
}

$pageWrite .= "</body>
</html>";

file_put_contents("./aboutUsPage.html", $pageWrite);

header("location:../appreciation/appreciation.php");
?>

