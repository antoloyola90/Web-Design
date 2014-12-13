<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<style>
		.container { width: 100%; height : 200px; //border: 3px solid #f7c; }
.textareaContainer {
    display: block;
    //border: 3px solid #38c;
    padding: 10px;
}
textarea { width: 100%; height : 150px; margin: 0; padding: 0; border-width: 1px; }
	</style>
</head>
<body>


<?php
session_start();

if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../loginForm.php");
}
$contactFile = file_get_contents('./contact/contactText.txt', FILE_USE_INCLUDE_PATH);
$aboutFile = file_get_contents('./about/aboutText.txt', FILE_USE_INCLUDE_PATH);
$appreciationFile = file_get_contents('./appreciation/appreciationText.txt', FILE_USE_INCLUDE_PATH);
 
?>

<div align="right"><a href="../logout.php">Logout</a></div>

<a href  = "./home.php"><h2>Check Out The New Website!!</h2></a><br/><br/>

<form action="runChanges.php" method="post" enctype="multipart/form-data">


<h3>--- Upload New Gallery ---</h3>


	<p>Gallery</p>
	<a href  = "./gallery/uploadZip.php">Gallery Upload Link</a>
	

<h3>--- Upload Main Page Background Images ---</h3>


	<p>Gallery</p>
	<a href  = "./changeMainPageImages.php">Background Images Link</a>
		
<h3>--- Edit About Inthab ---</h3>

	<p>About</p>
	<div class="container">
	<label for="file">Background File ('jpg'):</label>
	<input type="file" name="file" id="file"><br>
	<p>Do not Remove Breaks</p>
	<label class="textareaContainer">
	<textarea name="about"><?php echo $aboutFile; ?></textarea>
	</label>
	</div>

<h3>--- Edit Appreciation ---</h3>


	<p>Appreciation</p>
	<div class="container">
	<p>Do not Remove Breaks</p>
	<label class="textareaContainer">
	<textarea name="appreciation"><?php echo $appreciationFile; ?></textarea>
	</label>
	</div>
	

<h3>--- Edit Contact ---</h3>


	<p>Your address</p>
	<div class="container">
	<p>Do not Change Format</p>
	<label class="textareaContainer">
	<textarea name="contact"><?php echo $contactFile; ?></textarea>
	</label>
	</div>
	
	
	<div><input type="submit" /></div>
	
	
</form>


</body>
</html>