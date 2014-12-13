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
      echo $file." - ".substr(sprintf('%o', fileperms($dir.''.$file)), -4)."<br/>";
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

chmod("chmod 775 /Library/WebServer/www", 755);
chmod("chmod 775 /Library/WebServer/www/*", 755);

echo 'Current PHP version: ' . phpversion();

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
      				
      				echo $file1. "        " . $file2 . "<br/>";
      				copy_directory ( $file1, $file2 );
      			}
      		}
      	}
    }				 	
    echo "Changes Made!"; 
}

function copy_directory($src,$dst) { 
    $dir = opendir($src); 
    mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                copy_directory($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
}

?>
</body>

</html>

