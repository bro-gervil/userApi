<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

class Pdf extends Dompdf {

    protected function ci() {
        return $this->get_instance;
        
    }

    public function load_view($view, $data = array()) {
        $dompdf = new Dompdf();
        $html = $this->ci()->load->view($view, $data, TRUE);

        $dompdf->loadHtml($html);

        // (Optionnel) Configurez la taille et l'orientation du papier
        $dompdf->setPaper('A4', 'landscape');

        // Rendre le HTML en PDF
        $dompdf->render();
        $time = time();

        // Affichez le PDF généré dans le navigateur
        $dompdf->stream("welcome-". $time);
    }
} 


