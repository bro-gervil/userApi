<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use Shieldon\Firewall\Firewall;
use Shieldon\Firewall\HttpResolver;
use Shieldon\Firewall\Panel;

class MyFirewall extends BaseController
{
    protected $firewall;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Autoloader Composer
        require_once APPPATH . '../vendor/autoload.php';

        // Ce répertoire doit être accessible en écriture.
        $storage = APPPATH . '../writable/shieldon_firewall';

        // Initialiser l'instance de Shieldon Firewall.
        $this->firewall = new Firewall();
        $this->firewall->configure($storage);
        
        $this->firewall->controlPanel('/firewall/panel/');

        // Exécuter Shieldon Firewall.
        $response = $this->firewall->run();

        if ($response->getStatusCode() !== 200) {
            $httpResolver = new HttpResolver();
            $httpResolver($response);
        }
    }

    public function firewall()
    {
        // Exécuter l'instance de Shieldon Firewall déjà initialisée.
        $this->firewall->run();
    }

    public function panel()
    {
        if(auth()->user()->inGroup('superadmin')){
            // Accéder au panneau de contrôle de Shieldon Firewall.
        $panel = new Panel();
        $panel->setRouteBase('/firewall');
        //$params = array(csrf_token(), csrf_hash());
        //$panel->csrf($params);
        $panel->entry('/firewall/panel/');
        }
        else{
            echo view('error');
        }
    }
}
