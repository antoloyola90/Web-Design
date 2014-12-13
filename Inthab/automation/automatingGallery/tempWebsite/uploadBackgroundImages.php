<?php

session_start();

if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../loginForm.php");
}


$backgroundImagesFile = './backgroundDescription.txt';

$toWrite = "";

$file = file_get_contents($backgroundImagesFile, FILE_USE_INCLUDE_PATH);

$arr = preg_split ('/\r\n|\n|\r/', $file);

for($count = 1; $count <=6 ; $count++) {
	$toWrite .= "Description ".$count." = ".$_POST['description'.$count];
	if($count !== 6){
		$toWrite .= "\n";
	}
}

	file_put_contents($backgroundImagesFile, $toWrite);

?>

<?php

$pathToStore = "./images/mainPageImages/";
$allowedExts = array("jpg");

for($count=1;$count <= 6; $count++){

$c = $count;

$nameToStore = $count.".jpg";
$temp = explode(".", $_FILES["file".$c]["name"]);
$extension = end($temp);

if($_FILES["file".$c]["name"] !== ""){
	

if (in_array($extension, $allowedExts))
  {
  if ($_FILES["file".$c]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file".$c]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file".$c]["name"] . "<br>";
    echo "Type: " . $_FILES["file".$c]["type"] . "<br>";
    echo "Size: " . ($_FILES["file".$c]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file".$c]["tmp_name"] . "<br>";

    if (file_exists($pathToStore . $_FILES["file".$c]["name"]))
      {
      echo $_FILES["file".$c]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file".$c]["tmp_name"],
      $pathToStore . $nameToStore);
      echo "Stored in: " . $pathToStore . $nameToStore;
      }
    }
    header("location:./makeChanges.php");
  }
else
  {
  	echo "Invalid Image!!<br/>";
  	echo "<a href='./makeChanges.php'>Go back to making changes</a>";
  }
 } 
}
header("location:./makeChanges.php");  
?>
