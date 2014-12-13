<?php
if(!session_is_registered('myusername')){ //if login in session is not set
    header("Location: ../../loginForm.php");
}

	$pageWrite = "";
	$pageWrite .= "<!DOCTYPE html>
<html>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<!-- Add jQuery library -->
		<script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>

		<!-- Add mousewheel plugin (this is optional) -->
		<script type='text/javascript' src='../js/jquery.mousewheel-3.0.6.pack.js'></script>

		<!-- Add fancyBox -->
		<link rel='stylesheet' href='../source/jquery.fancybox.css?v=2.1.5' type='text/css' media='screen' />
		<script type='text/javascript' src='../source/jquery.fancybox.pack.js?v=2.1.5'></script>

		<!-- Optionally add helpers - button, thumbnail and/or media -->
		<link rel='stylesheet' href='../source/helpers/jquery.fancybox-buttons.css?v=1.0.5' type='text/css' media='screen' />
		<script type='text/javascript' src='../source/helpers/jquery.fancybox-buttons.js?v=1.0.5'></script>
		<script type='text/javascript' src='../source/helpers/jquery.fancybox-media.js?v=1.0.6'></script>

		<link rel='stylesheet' href='../source/helpers/jquery.fancybox-thumbs.css?v=1.0.7' type='text/css' media='screen' />
		<script type='text/javascript' src='../source/helpers/jquery.fancybox-thumbs.js?v=1.0.7'></script>

	<script type='text/javascript'>
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$('.fancybox-effects-a').fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$('.fancybox-effects-b').fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$('.fancybox-effects-c').fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$('.fancybox-effects-d').fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				prevEffect : 'elastic',
				nextEffect : 'elastic',
				
				closeBtn  : true,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
					
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$('#fancybox-manual-a').click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$('#fancybox-manual-b').click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$('#fancybox-manual-c').click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type='text/css'>
		/*.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
			
		}*/

		body {
			max-width: 550px;
			margin: 0 auto;
			color:white;
		}
		.fancybox-overlay {
	
		background: white;
		
		}
		.fancybox-skin {
	
		opacity: 1.0 !important; 
	
		}
		#float-bottom
		{
			position: fixed; 
			bottom: 5px;
			padding:5px;
		}
		a
		{
			color:white;
		}
		
	</style>
	
	<script type='text/javascript'>
	
	function changeProjectNameOnClick(str){
		document.getElementById('projectName1').innerHTML=str;
		document.getElementById('projectName2').innerHTML=str;
	}
	function changeProjectNameOnMouseOut(){
		document.getElementById('projectName1').innerHTML='&nbsp;';
		document.getElementById('projectName2').innerHTML='&nbsp;';
	}
	</script>
	
</head>

<body bgcolor='black'>

	<h2 align='center' id='projectName1'>&nbsp;</h2>
	";	
	
	$dir = "./";
	$thumb = $dir."thumb/";
	$gallery = $dir."images/";
	
	$pageWrite .= "
	<p>
	";
	
	if (is_dir($gallery)){
		if ($dh = opendir($gallery)){
  			while (($file = readdir($dh)) !== false){
    			if(0 !== strpos($file, '.') && 0 !== strpos($file, 'bottomLinks')){ 
      				if (is_dir($gallery.$file)){
  						if ($dh1 = opendir($gallery.$file)){
    						while (($file1 = readdir($dh1)) !== false){
      							if(0 !== strpos($file1, '.')){ 
      								
      								if (is_dir($gallery.$file."/".$file1)){
  										if ($dh2 = opendir($gallery.$file."/".$file1)){
    										while (($file2 = readdir($dh2)) !== false){
      											if(0 !== strpos($file2, '.')){ 
      												$number = substr($file2, 0, strpos($file2, ' '));
      												$projectName = substr($file2, strpos($file2, ' '));
      												$temp = explode(".", $projectName);
													$projectName = $temp[0];
      												if($number === '1'){
      													$pageWrite .= "<a class='fancybox-thumbs' title='".$projectName."' data-fancybox-group='".$file.$file1."' href='".$gallery.$file."/".$file1."/".$file2."' >
																	<img class='greyToColor' onmouseover=\"changeProjectNameOnClick('".$file."')\" onmouseout='changeProjectNameOnMouseOut()' src='".$thumb.$file."/".$file1."/".$file2."' 
																	alt='".$projectName."'  /></a>\n";
													}
													
													else {
														$pageWrite .= "<a class='fancybox-thumbs' title='".$projectName."' data-fancybox-group='".$file.$file1."' href='".$gallery.$file."/".$file1."/".$file2."' ></a>\n";

													}
      											}
      										}
      										closedir($dh2);
      									}
      								}				
      							}
      						}
      						closedir($dh1);
      					}
      				}			
				
				
				}
			}
			closedir($dh);
		}
	}			
	
$pageWrite .= "
	
</p>
	
	<table max-width='550px' width='100%' id='floatt-bottom'>
	<tr>";
	
		
			if (is_dir($gallery)){
				if ($dh3 = opendir($gallery)){
  					while (($file3 = readdir($dh3)) !== false){
    					if(0 !== strpos($file3, '.') && 0 === strpos($file3, 'bottomLinks')){
    						
    						if (is_dir($gallery.$file3)){
								if ($dh4 = opendir($gallery.$file3)){
  									while (($file4 = readdir($dh4)) !== false){
    									if(0 !== strpos($file4, '.')){
    										
    										
    										$pageWrite .= "<td width='37%' align='left'>";
    										
    												
    										if (is_dir($gallery.$file3."/".$file4)){
  												if ($dh5 = opendir($gallery.$file3."/".$file4)){
    												while (($file5 = readdir($dh5)) !== false){
      													if(0 !== strpos($file5, '.')){
      														$number1 = substr($file5, 0, strpos($file5, ' '));
      														$projectName1 = substr($file5, strpos($file5, ' '));
      														$temp1 = explode(".", $projectName1);
															$projectName1 = $temp1[0];
      														if($number1 === '1'){
      															$pageWrite .= "<a class='fancybox-thumbs' title='".$projectName1."' data-fancybox-group='".$file3.$file4."' href='".$gallery."bottomLinks/".$file4."/".$file5."'>
      															".$projectName1."</a>\n";
      														
      														}
      														
      														else {
      															$pageWrite .= "<a class='fancybox-thumbs' title='".$projectName1."' data-fancybox-group='".$file3.$file4."' href='".$gallery."bottomLinks/".$file4."/".$file5."'>
      															</a>\n";      														
      														}
      													}
      												}
      												closedir($dh5);
      											}
      										}
      										
      										$pageWrite .= "</td>";
      										
      										
      													 	
    									}
    								}
    								closedir($dh4);
    							}
    						}			
    					}
    				}
    				closedir($dh3);
    			}
    		}			 
	
	
	$pageWrite .= "
	</tr>
	</table>

	
	<h2 align='center' id='projectName2'>&nbsp;</h2>
	
</body>
</html>";

file_put_contents("./galleryPage.html", $pageWrite);

header("location:../contact/contactUs.php");

?>