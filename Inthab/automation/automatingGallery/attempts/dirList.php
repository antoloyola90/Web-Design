<?php

$list = "";
$q = $_REQUEST['q'];

// Open a directory, and read its contents
if (is_dir($q)){
  if ($dh = opendir($q)){
    while (($file = readdir($dh)) !== false){
     
      if(0 !== strpos($file, '.')){
      	$list .= $file;
      	$list .= " ";
      }	
      
    }
    closedir($dh);
  }
}

echo $list;
?>