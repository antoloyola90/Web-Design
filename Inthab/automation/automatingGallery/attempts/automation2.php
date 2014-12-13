<html>

<head>

	<script type="text/javascript">
		

function getList(str)
{

var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","dirList.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body onload="getList('../gallery/images/')">

<p>Suggestions: <span id="txtHint"></span></p>


<select id="firstSelectBox" onchange="getList(this.value)">
<?php


$dir = "../gallery/images/";

// Open a directory, and read its contents
if (is_dir($dir)){
  if ($dh = opendir($dir)){
    while (($file = readdir($dh)) !== false){
      if(0 !== strpos($file, '.')){
      	echo "<option value='$file'> $file </option>";
      }	
    }
    closedir($dh);
  }
}
?> 

</select>

<select id="secondSelectBox">

</select>

<button type="Button" onclick="createImages()">Create!</button>

<div id="imageBox"></div>

</body>

</html>

