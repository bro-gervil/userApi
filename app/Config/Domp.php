<?php namespace Config;

use Dompdf\Dompdf as DompdfLib;
use CodeIgniter\Config\BaseService;

class Dompdf extends BaseService
{
    public static function init($getShared = true)
    {
        if ($getShared)
        {
            return static::getSharedInstance('Dompdf');
        }

        return new DompdfLib();
    }
}