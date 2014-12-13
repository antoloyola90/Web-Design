
<?php

session_start();

if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../loginForm.php");
}

$contactFile = './contact/contactText.txt';
$aboutFile = './about/aboutText.txt';
$appreciationFile = './appreciation/appreciationText.txt';

$contact = $_POST["contact"];
$about = $_POST["about"];
$appreciation = $_POST["appreciation"];

$contact = str_replace ("\\", "", $contact);
$about = str_replace ("\\", "", $about);
$appreciation = str_replace ("\\", "", $appreciation);

//echo $contact."<br/><br/>";
//echo $about."<br/><br/>";
//echo $appreciation."<br/><br/>";

if ( $contact !== "" && $about !== "" && $appreciation !== "") { 
	file_put_contents($contactFile, $contact);
	file_put_contents($aboutFile, $about);
	file_put_contents($appreciationFile, $appreciation);
}


?>

<?php    
    
$pathToStore = "./about/";
$nameToStore = "aboutPageImage.jpg";

unlink($pathToStore.$nameToStore);

$allowedExts = array("jpg");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if($_FILES["file"]["name"] === ""){
	header("location:./about/about.php");
}

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
      $pathToStore . $nameToStore);
      echo "Stored in: " . $pathToStore . $nameToStore;
      }
    }
    header("location:./about/about.php");
  }
else
  {
  	echo "Invalid About Image!!<br/>";
  	echo "<a href='./makeChanges.php'>Go back to making changes</a>";
  }
  
?>

