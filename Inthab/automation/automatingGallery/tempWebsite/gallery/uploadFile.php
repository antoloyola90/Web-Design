<?php

$toContinue = true;

$pathToStore = "./";

$allowedExts = array("zip", "Zip", "ZIP");
echo "File : ".$_FILES["file"]["name"]."<br/>";   
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
echo "Ext : ".$extension."<br/>";
if (in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    echo "<p>Invalid file</p>";
  	echo "<br/><br/><a href='./uploadZip.php'>Go Back to Gallery Upload</a>";
    $toContinue = false;
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists($pathToStore . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $pathToStore . $_FILES["file"]["name"]);
      echo "Stored in: " . $pathToStore . $_FILES["file"]["name"];
      $toContinue = true;
      }
    }
  }
else
  {
  echo "<p>Invalid file</p>";
  echo "<br/><br/><a href='./uploadZip.php'>Go Back to Gallery Upload</a>";
  $toContinue = false;
  }
  
  
?>

<?php

function recurse_copy($src, $dst) {

$dir = opendir($src);
$result = ($dir === false ? false : true);

if ($result !== false){
    $result = mkdir($dst);

    if ($result === true){
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' ) && $result) { 
                if ( is_dir($src . '/' . $file) ) { 
                    $result = recurse_copy($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    $result = copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir);
    }
}

return $result;
}


function deleteDir($dir)
    { 
        $files = array_diff(scandir($dir), array('.','..')); 

        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? deleteDir("$dir/$file") : unlink("$dir/$file"); 
        }

        return rmdir($dir); 
    } 
    
if($toContinue){

rename($pathToStore . $_FILES["file"]["name"], $pathToStore ."gallery1.zip");

deleteDir($pathToStore . "gallery1/");
deleteDir($pathToStore . "thumb/");
deleteDir($pathToStore . "images/");

$zip = new ZipArchive;
if ($zip->open($pathToStore."gallery1.zip") === TRUE) {
	$path = $pathToStore; 
   
	echo $path;
	$zip->extractTo($path);
    $zip->close();
    
    echo 'ok<br/>';
    
    unlink ($pathToStore . "gallery1.zip");
    deleteDir($pathToStore . "__MACOSX");
} else {
    echo 'failed';
}

rename($pathToStore . $temp[0]."/", $pathToStore ."/gallery1/");


recurse_copy($pathToStore."gallery1"."/thumb/", $pathToStore."thumb/");
recurse_copy($pathToStore."gallery1"."/images/", $pathToStore."images/");

deleteDir($pathToStore . "gallery1". "/");
	

header("location:../about/about.php");

}


?>