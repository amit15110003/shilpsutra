<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */


// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Arkish Jewels');
$pdf->SetTitle('Invoice');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 10);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$table='<table><style>

th {
    font: caption;
    font-family: "Times New Roman", Times, san-serif;
    font-weight: normal;
     font-size: 14px;
}
</style>';
$table.='<tr>
            <th><img src="'.base_url().'../media/images/logosm.png" style="height:60px;"></th>
            </tr>';
$table.='</table>';  
$pdf->writeHTMLCell(0, 0, '', '',$table, 0, 1, 0, true, '', true);


$table='<table><style>

th {
    font: caption;
    font-family: "Times New Roman", Times, san-serif;
    font-weight: normal;
     font-size: 14px;
}
</style>';
$details= $this->user->get_deliveryadd_by_id($uid);
$table.='<tr>
            <th></th>
            <th></th><th></th>
            <th ><p>To</p>
                <p style="text-transform: capitalize;">'.$details[0]->fname.' '.$details[0]->lname.' 
                <br>'.$details[0]->addr.'<br>'.$details[0]->town.'
                <br>'.$details[0]->state.', '.$details[0]->pin.'
                </p>
                <br>
            </th>
            <th>'.$details[0]->fname.'</th>
            </tr>';
$table.='</table>';  
$pdf->writeHTMLCell(0, 0, '', '',$table, 0, 1, 0, true, '', true);

$table='<table>
<style>
tr {margin-top:5px;}
th {
    font: caption;
    font-family: "Times New Roman", Times, san-serif;
    font-weight: normal;
     font-size: 14px;
    border-bottom: 1px solid #ddd;
}
</style>';
$table.='<tr>

        <th></th>
        <th>Product</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Sub Total</th>
        </tr><br>';

 foreach( $query as $row){
    $details=$this->user->get_product_id($row->productid);
    $table.='<tr>
            <th><img src="'.base_url().'../uploads/'.$details[0]->picture.'" style="height:90px;padding:2px;"></th>
            <th ><p style="text-transform: capitalize;">'.$details[0]->title.'</p></th>
            <th>'.$row->item.'</th>
            <th>$'.$details[0]->cost.'</th>
            <th>$'.$details[0]->cost*$row->item.'</th>
            </tr><br>';
            } 
         $i=0;
    foreach( $query as $row){
    $details=$this->user->get_product_id($row->productid);
    $i=$i+($details[0]->cost*$row->item);}
    $table.='<tr>
            <th></th>
            <th></th>
            <th></th>
            <th>Total</th>
            <th>$'.$i.'</th>
            </tr>';
            
    $table.='</table>';      

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '',$table, 0, 1, 0, true, '', true);

// Set some content to print
$html = <<<EOD
<style>
html {
  font-family: sans-serif;
  -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
}
body {
  margin: 0;
}
</style>
<br>
<h1 style="text-align: center;">Arkish Jewels</h1>
<h4 style="text-align: center;">http://arkishjewels.com/</h4>
EOD;
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.

$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
