<?php
/**
 * Created by SERVICIOS Y SISTEMAS MARIANNY MARTINEZ FP.
 * User: Julio Aponte
 * Date: 13/07/16
 * Time: 07:10 PM
 */

class pdfController extends Controller {

    private $_pdf;

    public function __construct()
    {
        parent::__construct();
        $this->getLibrary('fpdf');
        $this->_pdf = new FPDF();
    }

    public function index(){}

    public function viewPdf($nombre,$apellido)
    {
        $this->_pdf->AddPage();
        $this->_pdf->SetFont('Arial','B',14);
        $this->_pdf->Cell(40,10, $nombre . ' ' . $apellido);
        $this->_pdf->Output();
    }
}