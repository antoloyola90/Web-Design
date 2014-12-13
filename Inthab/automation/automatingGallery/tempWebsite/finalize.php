<?php 

session_start();

if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../loginForm.php");
}


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
    
    
?>

<?php
	deleteDir("../../previousWebsites/last/");
	
	mkdir("../../previousWebsites/last/");

	recurse_copy("../../about/", "../../previousWebsites/last/about/");
	recurse_copy("../../appreciation/", "../../previousWebsites/last/appreciation/");
	recurse_copy("../../contact/", "../../previousWebsites/last/contact/");
	
	recurse_copy("../../images/", "../../previousWebsites/last/images/"); 
	
	mkdir("../../previousWebsites/last/gallery/");
	copy("../../gallery/galleryPage.html","../../previousWebsites/last/gallery/galleryPage.html");
	recurse_copy("../../gallery/images/", "../../previousWebsites/last/gallery/images/");
	recurse_copy("../../gallery/thumb/", "../../previousWebsites/last/gallery/thumb/"); 
	
	copy("../../index.html","../../previousWebsites/last/index.html");

?>

<?php
	
	deleteDir("../../about/");
	deleteDir("../../appreciation/");
	deleteDir("../../contact/");
	deleteDir("../../images/");
	deleteDir("../../gallery/");
	unlink("../../index.html");


?>

<?php
	
	recurse_copy("./about/", "../../about/");
	
	mkdir("../../about/");
	copy("./about/aboutUsPage.html","../../about/aboutUsPage.html");
	copy("./about/aboutPageImage.jpg","../../about/aboutPageImage.jpg");
	
	mkdir("../../appreciation/");
	copy("./appreciation/appreciationPage.html","../../appreciation/appreciationPage.html");
	copy("./appreciation/link.png","../../appreciation/link.png");
	
	mkdir("../../contact/");
	copy("./contact/contactUsPage.html","../../contact/contactUsPage.html");
	copy("./contact/mapLocationPage.html","../../contact/mapLocationPage.html");
	
	recurse_copy("./images/", "../../images/"); 
	
	mkdir("../../gallery/");
	copy("./gallery/galleryPage.html","../../gallery/galleryPage.html");
	recurse_copy("./gallery/thumb/", "../../gallery/images/");
	recurse_copy("./gallery/thumb/", "../../gallery/thumb/"); 
	
	copy("./index.html","../../index.html");

	
header("location:../logout.php"); 
?>