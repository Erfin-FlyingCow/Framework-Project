<?php

namespace App\Libraries;

use TCPDF;

class MY_TCPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = ROOTPATH.'public/logopnj.png';
        /**
         * width : 50
         */
        $this->Image($image_file, '', '2', '33');
        // Set font
        $this->SetFont('helvetica', 'B', 11);
        $this->SetX(60);
        $this->Cell(0, 2, 'Politeknik Negeri Jakarta', 0, 1, '', 0, '', 0);
        // Title
        $this->SetFont('helvetica', '', 9);
        $this->SetX(60);
        $this->Cell(0, 2, 'Jl. Prof. DR. G.A. Siwabessy Kampus Universitas Indonesia Depok 16425', 0, 1, '', 0, '', 0);
        $this->SetX(60);
        $this->Cell(0, 2, 'Telp. 0217270036', 0, 1, '', 0, '', 0);
        $this->SetX(60);
        $this->Cell(0, 2, 'https://pnj.ac.id/', 0, 1, '', 0, '', 0);
        
        // QRCODE,H : QR-CODE Best error correction
        $this->write2DBarcode('https://pnj.ac.id/', 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');

        $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(15, 25, 195, 25, $style);

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}