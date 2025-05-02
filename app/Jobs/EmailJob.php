<?php

namespace App\Jobs;

use CodeIgniter\Queue\BaseJob;
use CodeIgniter\Queue\Interfaces\JobInterface;
use Exception;


class EmailJob extends BaseJob implements JobInterface
{
         /**
     * @throws Exception
     */
    public function process()
    {
        $email  = service('email', null, false);
        $result = $email;
            $email->setFrom($this->data['from']);
            $email->setTo($this->data['to']);
            $email->setSubject($this->data['subject']);
            $email->setMessage($this->data['message']);
            $email->send(false);

        if (! $result) {
            throw new Exception($email->printDebugger('headers'));
        }

        return $result;
    }
}
