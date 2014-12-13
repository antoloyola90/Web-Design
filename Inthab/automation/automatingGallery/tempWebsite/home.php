<?php
if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../../loginForm.php");
}

	$pageWrite = "";
	$pageWrite .= "<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class='ie ie6 no-js' lang='en'> <![endif]-->
<!--[if IE 7 ]>    <html class='ie ie7 no-js' lang='en'> <![endif]-->
<!--[if IE 8 ]>    <html class='ie ie8 no-js' lang='en'> <![endif]-->
<!--[if IE 9 ]>    <html class='ie ie9 no-js' lang='en'> <![endif]-->
<!--[if gt IE 9]><!--><html class='no-js' lang='en'><!--<![endif]-->
    <head>
        <meta charset='UTF-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'> 
        <title>Int-Hab - Architecture + Design Studio</title>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'> 
        <meta name='description' content='' />
        <meta name='keywords' content='' />
        <meta name='author' content='Anto Loyola' />
        <link rel='shortcut icon' href='../favicon.ico'> 
        <link rel='stylesheet' type='text/css' href='css/demo.css' />
        <link rel='stylesheet' type='text/css' href='css/style2.css' />
		<script type='text/javascript' src='js/modernizr.custom.86080.js'></script>
		<!-- Add jQuery library -->
		<script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>

		<!-- Add mousewheel plugin (this is optional) -->
		<script type='text/javascript' src='js/jquery.mousewheel-3.0.6.pack.js'></script>

		<!-- Add fancyBox -->
		<link rel='stylesheet' href='source/jquery.fancybox.css?v=2.1.5' type='text/css' media='screen' />
		<script type='text/javascript' src='source/jquery.fancybox.pack.js?v=2.1.5'></script>

		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel='stylesheet' href='source/helpers/jquery.fancybox-buttons.css?v=1.0.5' type='text/css' media='screen' />
		<script type='text/javascript' src='source/helpers/jquery.fancybox-buttons.js?v=1.0.5'></script>
		<script type='text/javascript' src='source/helpers/jquery.fancybox-media.js?v=1.0.6'></script>

		<link rel='stylesheet' href='source/helpers/jquery.fancybox-thumbs.css?v=1.0.7' type='text/css' media='screen' />
		<script type='text/javascript' src='source/helpers/jquery.fancybox-thumbs.js?v=1.0.7'></script>
		<link href='//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
    </head>
    <body id='page'>
    	<script type='text/javascript'>
			$(document).ready(function() {
								
				  
				
				$('.various').fancybox({
					maxWidth	: 800,
					maxHeight	: 600,
					fitToView	: true,
					width		: '90%',
					height		: '70%',
					autoSize	: false,
					closeClick	: false,
					openEffect	: 'elastic',
					closeEffect	: 'fade'
				});
				$('.various2').fancybox({
					maxWidth	: 800,
					maxHeight	: 600,
					fitToView	: true,
					width		: '45%',
					height		: '70%',
					minWidth 	: 200,
					minHeight   : 300,
					autoSize	: false,
					closeClick	: false,
					openEffect	: 'elastic',
					closeEffect	: 'fade'
				});
				$('.fancybox').fancybox({
					openEffect	: 'elastic',
					closeEffect	: 'fade',
					width		: '50%',
					height		: '90%'
				});
			});
			
			
		</script>
		
		<nav class='cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left' id='cbp-spmenu-s1'>
			<a class='various' data-fancybox-type='iframe' href='./about/aboutUsPage.html'>About Int-Hab</a>
			<a class='various2' data-fancybox-type='iframe' href='./appreciation/appreciationPage.html'>Appreciation</a>
			<a class='fancybox' data-fancybox-type='iframe' href='./gallery/galleryPage.html'>Gallery</a>
			<a class='various' data-fancybox-type='iframe' href='./contact/contactUsPage.html'>Contact us</a>
		</nav>
		<section class='bt-menu'>
				<button id='showLeft'> </button>
		</section>
		
	";
	
	$file = file_get_contents('./backgroundDescription.txt', FILE_USE_INCLUDE_PATH);

		$arr = preg_split ('/\r\n|\n|\r/', $file);
		
		
        $pageWrite .= "<ul class='cb-slideshow'>";
        
        
        	for($count = 1; $count<=6; $count++){
        		list ($value1, $value2) = split(" = ", $arr[$count - 1]);
            	$pageWrite .= "<li><span>Image 0".$count."</span><div><h3>".$value2."</h3></div></li>\n";
            }
            	
            
        $pageWrite .= "</ul>";
        $pageWrite .= "
        <div class='container'>
			<header>
			
            <h1><img src='./images/logo.png'></h1>
            <iframe width='400px' src='./social/socialPlugins.php' frameborder='0'></iframe>
            </header>
            

        </div>
		<script src='js/classie.js'></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeft = document.getElementById( 'showLeft' ),
				body = document.body;
			showLeft.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
			};
			
		</script>
		
    </body>
</html>";
	
file_put_contents("./index.html", $pageWrite);	

header("Location: ./tempWebsite.php");
?>
