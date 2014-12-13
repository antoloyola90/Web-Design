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
		color:white;
	}
	table
	{
	border-collapse:separate;
	empty-cells:hide;
	}	
	</style>
</head>
<body>


 
 <table width='100%' border='1'>
 <tr>
";

$file = file_get_contents('./contactText.txt', FILE_USE_INCLUDE_PATH);
$numberOfAddresses =  mb_substr_count($file, "breakForAnotherOffice") + 1; 
$addresses = explode("breakForAnotherOffice", $file);

for($count = 0; $count < $numberOfAddresses; $count++) {
 
 	$arr = preg_split ('/\r\n|\n|\r/', $addresses[$count]);

	$mapAddress = "";

	foreach ($arr as &$value) {
		if($value !== " " && $value !== ""){
			$valueSplits1 = substr($value, 0, strpos($value, '=') - 1);
			$valueSplits2 = substr($value, strpos($value, '=') + 1);
			if($valueSplits2 !== " " && $valueSplits2 !== ""){
				if($valueSplits1 === "Location"){
					$mapAddress .= "<b>".$valueSplits2."</b><br/>";
				}
				else{
					$mapAddress .= $valueSplits2."<br/>";
				}
			}
		}	
    }
	if($count == 0){
		$pageWrite .= "
		<td align='left' width='50%'>";
	}
	else if($count == $numberOfAddresses - 1){
		$pageWrite .= "
		<td align='right' width='50%'>";
	}
	else{
		$pageWrite .= "
		<td>";
	}	
	$pageWrite .="
                    		<div>
                    			<p>
                    			
                    			".$mapAddress."
                    			
                    			 </p> 
                    		</div>	
                    	</td>";
                    	
  }
  
  $pageWrite .= "                    		
  </tr>
  </table>
  <div>
                    		<iframe width='100%' height='100%' src='./mapLocationPage.html'></iframe>
                    		<br/>
                    		</div>
        				                 		


</body>
</html>
";
file_put_contents("./contactUsPage.html", $pageWrite);

header("location:./mapLocation.php");

?>
