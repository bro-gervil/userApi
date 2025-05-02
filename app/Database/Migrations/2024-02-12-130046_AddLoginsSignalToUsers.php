<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Forge;

use CodeIgniter\Database\Migration;

class AddLoginsSignalToUsers extends Migration
{
      /**
     * @var string[]
     */
    private array $tables;

    public function __construct(?Forge $forge = null)
    {
        parent::__construct($forge);

        /** @var \Config\Auth $authConfig */
        $authConfig   = config('Auth');
        $this->tables = $authConfig->tables;
    }


    public function up()
    {

        $fields = [
            'logged_in' => ['type' => 'INT', 'constraint' => '1', 'null' => false],
        ];
        $this->forge->dropColumn($this->tables['logins'], $fields);
        
    }

    public function down()
    {
       /* 
        $fields = [
            'logged_in' => ['type' => 'INT','constraint' => '1', 'null' => false],
        ];
        $this->forge->addColumn($this->tables['logins'], $fields);
        */
    }
    
}
