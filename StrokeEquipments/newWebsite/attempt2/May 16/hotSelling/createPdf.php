<?php
// Get required files.
require './example/fpdf/fpdf.php';

// Set some document variables
$author = "Stroke Equipments";
$x = 50;
$text = <<<EOT
facilisis Praesent ultricies vitae, placerat dapibus, turpis commodo morbi tristique erat et amet egestas. faucibus, lacus Quisque amet, est amet erat. facilisis. Aliquam eget, quam tincidunt ipsum sagittis eros vitae eu Vestibulum cursus dui pharetra. erat metus condimentum felis. pulvinar Vestibulum ac habitant neque rutrum feugiat quam, leo. elit tincidunt id Pellentesque sapien sit condimentum, accumsan vitae, eu egestas eget tortor turpis sit dui. neque wisi. ultricies Nam augue, est. porttitor, et eu fermentum, egestas ac ullamcorper tortor enim ante. netus eros luctus, malesuada amet, magna orci, Aenean in vulputate libero quis, non sit Mauris wisi, volutpat. sed, tempus et eleifend fames Donec sit semper. Aenean mi mi, ornare enim tempor Ut Donec senectus.
EOT;

// Create fpdf object
$pdf = new FPDF('P', 'pt', 'Letter');
// Set base font to start
$pdf->SetFont('Times', 'B', 24);
// Add a new page to the document
$pdf->addPage();
// Set the x,y coordinates of the cursor
$pdf->SetXY($x,50);
// Write 'Simple PDF' with a line height of 1 at the current position

$completeToPrint = "";

$productNumber = $_GET['productNumber'];

$file = file_get_contents('./details/'.$productNumber.'.txt', FILE_USE_INCLUDE_PATH);
 
 $arr = preg_split ('/\r\n|\n|\r/', $file);

$processDoing = "";
 
 foreach ($arr as &$value) {
	if(strpos($value, 'Product') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$pdf->Write(25,$value2);
	}
	else if(strpos($value, 'Part Number') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$pdf->Write(20,"Part Number : $value2");
			// Reset the font
		$pdf->SetFont('Courier','I',10);
		// Set the font color
		$pdf->SetTextColor(255,0,0);
		// Reset the cursor, write again.
		$pdf->SetXY($x, 75);
		$pdf->Cell(0,11, "By: $author", 'B', 2, 'L', false);
	}
	
    
}
	
	// Place an image on the pdf document
	$pdf->Image('./images/'.$productNumber.'.jpg', $x, 100, 150, 112.5, 'JPG');

 
  foreach ($arr as &$value) {
	if(strpos($value, 'Unique Features') === 0){
		$completeToPrint .=  "<h5 align='left'>".$value."</h5>\n";
		$processDoing = "Unique Features";
		$completeToPrint .=  "<ul>\n";
	}
	if(strpos($value, 'point') === 0 && strpos($processDoing, 'Unique Features') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$completeToPrint .=  "<li align='left'>".$value2."</li>\n";
	}
	if(strpos($value, 'Features End') === 0 && strpos($processDoing, 'Unique Features') === 0){
		$processDoing = "";
		$completeToPrint .=  "</ul>\n";
		//echo "<br/><br/>\n";
	}
	
	if(strpos($value, 'Applications') === 0 && strpos($value, 'Applications End') !== 0){
		$completeToPrint .=  "<h5 align='left'>".$value."</h5>\n";
		$processDoing = "Applications";
		$completeToPrint .=  "<ul>\n";
	}
	if(strpos($value, 'point') === 0 && strpos($processDoing, 'Applications') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		$completeToPrint .=  "<li align='left'>".$value2."</li>\n";
	}
	if(strpos($value, 'Applications End') === 0 && strpos($processDoing, 'Applications') === 0){
		$processDoing = "";
		$completeToPrint .=  "</ul>\n";
	}
   
}
 
	$completeToPrint .= "</td>\n";
	$completeToPrint .= "</tr>\n";
	$completeToPrint .= "</table>\n";

 
  foreach ($arr as &$value) {
	if(strpos($value, 'table heading') === 0){
		$value1 = substr($value, 0, strpos($value, ':') - 1);
		$value2 = substr($value, strpos($value, ':') + 1);
		$completeToPrint .=  "<h5 align='left'>".$value2."</h5>\n";
		$completeToPrint .=  "<table width='100%' border='1'>\n";
		$processDoing = "table heading";
	}
	if(strpos($value, 'point') === 0 && strpos($processDoing, 'table heading') === 0){
		$value1 = substr($value, 0, strpos($value, '-') - 1);
		$value2 = substr($value, strpos($value, '-') + 1);
		
		$value3 = substr($value2, 0, strpos($value2, ',') - 1);
		$value4 = substr($value2, strpos($value2, ',') + 1);
		
		$completeToPrint .=  "<tr>\n<td>\n".$value3."</td>\n";
		$value5 = substr($value4, 0, strpos($value4, '=') - 1);
		$value6 = substr($value4, strpos($value4, '=') + 1);
		
		$completeToPrint .=  "<td>".$value6."</td>\n</tr>\n";
	}
	if(strpos($value, 'table end') === 0 && strpos($processDoing, 'table heading') === 0){
		$processDoing = "";
		$completeToPrint .=  "</table>\n";
		//echo "<br/><br/>\n";
	}	
}
	setcookie("completeToPrint", $completeToPrint, time()+300);
	echo "<a href='./createPdf.php'>Pdf</a>";
	echo $completeToPrint;





// Reset font, color, and coordinates
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY($x, 250);

// Write out a long text blurb.
$pdf->write(13, $text);

// Close the document and save to the filesystem with the name simple.pdf
$pdf->Output('simple.pdf','I');
?>