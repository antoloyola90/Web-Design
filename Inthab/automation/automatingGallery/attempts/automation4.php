<html>

<head>

</head>

<body>

<form action='' method='post'> 
<table>
	<tr>
		<th>Project Type</th>
		<th>Rename</th>
	</tr>	

<?php


$dir = "../gallery/thumb1/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      if(0 !== strpos($file, '.')){
     	echo "<tr>";
      	echo "<td><a href='projectName.php'> $file </a></td>";
      	echo "<td><input type='text' name='rename$file' value='$file'/></td>";
      	echo "</tr>";
      }	
    }
    closedir($dh);
  }
}
?> 
</table>


<button type="submit" name="makeChanges">Make Changes!</button>
</form>

<?php

$dir = "../gallery/thumb1/";


if(isset($_POST['makeChanges'])) 
{ 
	if (is_dir($dir)){
  		if ($dh = opendir($dir)){
  			while (($file = readdir($dh)) !== false){
      			if(0 !== strpos($file, '.')){
      				$file1 = $dir; 
      				$file1 .= $file;
      				
      				$file2 = $dir; 
      				$file2 .= $_POST["rename$file"];
      				
      				rename ( $file1, $file2 );
      			}
      		}
      	}
    }				 	
    header("location:automation4.php"); 
}


?>
</body>

</html>

