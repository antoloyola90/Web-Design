<html>

<head>
<?php

session_start();

if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../loginForm.php");
}


?>
</head>

<body>

<h2>Change only what you want to change!!</h2>

<form action="uploadBackgroundImages.php" method="post"
enctype="multipart/form-data">

<table border="1">

<tr>
<th>
#
</th>
<th>
Image
</th>
<th>
Description
</th>
<th>
New Upload
</th>
</tr>

<?php
$file = file_get_contents('./backgroundDescription.txt', FILE_USE_INCLUDE_PATH);

$arr = preg_split ('/\r\n|\n|\r/', $file);

for($count = 1; $count <= 6 ; $count++) {

	echo "<tr>";
	echo "<td>";
	echo "<label for='file'>Image ".$count." :</label>";

	echo "</td>";
	echo "<td>";
	echo "<img src='./images/mainPageImages/".$count.".jpg' width='100px' height='100px'/>";
	
	echo "</td>";
	echo "<td>";
	list ($value1, $value2) = split(" = ", $arr[$count - 1]);
	echo "<input type='text' name='description".$count."' value='".$value2."' size='60'/>";
	echo "</td>";
	echo "<td>";
	
	echo "<p><b>(683 X 1024 or 1024 x 683)&nbsp;&nbsp;('jpg')</b></p>";
	echo "<input type='file' name='file".$count."' id='file".$c."'/><br/>";
	echo "</td>";
	echo "</tr>";
}


?>

</table>
<br/><br/>
<input type="submit" name="submit" value="Make Changes!!">
</form>

<a href  = "./makeChanges.php">Go Back to Making Other Changes</a>

</body>

</html>