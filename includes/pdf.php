<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
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
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF
{

  // Load table data from file
  public function LoadData()
  {
    // Read file lines
    include 'conexao.php';
    $sql = "SELECT * FROM usuario WHERE id_usuario > 1";
    $query = mysqli_query($conn, $sql);
    return $query;
  }

  // Colored table
  public function ColoredTable($header, $data)
  {
    // Colors, line width and bold font
    $this->SetFillColor(255, 0, 0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128, 0, 0);
    $this->SetLineWidth(0.3);
    $this->SetFont('', 'B');
    // Header
    $w = array(62, 40, 40, 40);
    $num_headers = count($header);
    for ($i = 0; $i < $num_headers; ++$i) {
      $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
    }
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224, 235, 255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = 0;
    foreach ($data as $row) {
      $this->Cell($w[0], 6, $row['nome'], 'LR', 0, 'L', $fill);
      $this->Cell($w[1], 6, $row['cpf'], 'LR', 0, 'L', $fill);
      $this->Cell($w[2], 6, $row['celular'], 'LR', 0, 'L', $fill);
      $this->Cell($w[3], 6, $row['telefone'], 'LR', 0, 'L', $fill);
      $this->Ln();
      $fill = !$fill;
    }
    $this->Cell(array_sum($w), 0, '', 'T');
  }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Telecall');
$pdf->SetTitle('Usuários');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('Telecall, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 011', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
  require_once(dirname(__FILE__) . '/lang/eng.php');
  $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('Nome', 'CPF', 'Celular', 'Telefone');

// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('pdf.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+