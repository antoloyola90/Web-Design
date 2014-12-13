<?php

$pathToStore = "./";

$allowedExts = array("zip");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
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
      }
    }
  }
else
  {
  echo "Invalid file";
  header("location:./uploadZip.php");
  }
  
  rename($pathToStore . $_FILES["file"]["name"], $pathToStore ."gallery1.zip");
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

function deleteDir($dir)
    { 
        $files = array_diff(scandir($dir), array('.','..')); 

        foreach ($files as $file) { 
            (is_dir("$dir/$file")) ? deleteDir("$dir/$file") : unlink("$dir/$file"); 
        }

        return rmdir($dir); 
    } 

recurse_copy($pathToStore."gallery1"."/thumb/", $pathToStore."thumb/");
recurse_copy($pathToStore."gallery1"."/images/", $pathToStore."images/");

echo $pathToStore . "gallery1". "/";
deleteDir($pathToStore . "gallery1". "/");

//header("location:../makeChanges.php");

?>