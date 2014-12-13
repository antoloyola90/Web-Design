<?php
// Get required files.
require 'fpdf/fpdf.php';

// Set some document variables
$author = "Me McMe";
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
$pdf->Write(25,'Simple PDF');
// Reset the font
$pdf->SetFont('Courier','I',10);
// Set the font color
$pdf->SetTextColor(255,0,0);
// Reset the cursor, write again.
$pdf->SetXY($x, 75);
$pdf->Cell(0,11, "By: $author", 'B', 2, 'L', false);

// Place an image on the pdf document
$pdf->Image('graph.jpg', $x, 100, 150, 112.5, 'JPG');

// Reset font, color, and coordinates
$pdf->SetFont('Arial','',12);
$pdf->SetTextColor(0,0,0);
$pdf->SetXY($x, 250);

// Write out a long text blurb.
$pdf->write(13, $text);

// Close the document and save to the filesystem with the name simple.pdf
$pdf->Output('simple.pdf','I');
?>