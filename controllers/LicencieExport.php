<?php

require_once('../tcpdf/tcpdf.php');
require_once('../classes/dao/LicencieDAO.php');

class LicencieExport
{
    private $licencieDAO;

    public function __construct(LicencieDAO $licencieDAO)
    {
        $this->licencieDAO = $licencieDAO;
    }

    public function exportToPDF($filename)
    {
        $licencies = $this->licencieDAO->getAll();

        $pdf = new TCPDF();
        $pdf->setHeaderData('', 0, 'Liste des Licenciés', '');
        $pdf->setHeaderFont(array('helvetica', '', 12));
        $pdf->setFooterFont(array('helvetica', '', 12));
        $pdf->SetDefaultMonospacedFont('courier');
        $pdf->SetAutoPageBreak(true, 10);
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);

        foreach ($licencies as $licencie) {
            $pdf->Cell(40, 10, 'Numéro de licence: ' . $licencie->getNumLicence(), 0, 1);
            $pdf->Cell(40, 10, 'Nom: ' . $licencie->getNom(), 0, 1);
            $pdf->Cell(40, 10, 'Prénom: ' . $licencie->getPrenom(), 0, 1);
            $pdf->Cell(40, 10, 'ID Catégorie: ' . $licencie->getIdCategorie(), 0, 1);
            $pdf->Ln(10);
        }

        $pdf->Output($filename, 'F');
    }
}
