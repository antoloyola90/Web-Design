<html>

<head>

<?php

session_start();

if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../loginForm.php");
}



?>

<script>
function confirmation()
{
var r=confirm("Are You Sure?");
if (r==true)
  {
		  window.location.assign("./finalize.php");
  }
}
</script>

</head>

<body>

<table width="100%" height="10px">

<tr>
<td width="50%" align="left">
<a href="./makeChanges.php">Go Back to Making Changes &gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;</a>
</td>
<td width="50%" align="right">
<a href="#" onclick="confirmation()">Finalize on this!! &gt;&gt;&gt;&gt;&gt;&gt;&gt;&gt;</a>
</td>
</tr>
</table>

<br/><br/>
<iframe src="./index.html" width="100%" height="90%"/>



</body>

</html>