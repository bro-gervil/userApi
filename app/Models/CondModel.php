<?php

namespace App\Models;

use CodeIgniter\Model;

class CondModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'conditionnement';
    protected $primaryKey       = 'id_unite';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_unite','libelle'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function getAll() {
        $db= \Config\Database::connect();
        $query =$db->query($db->escapeString("SELECT libelle FROM conditionnement,prod_stock WHERE
            condtionnement.id_unite=prod_stock.id_unite ORDER BY prod_stock.id_unite DESC;"));
        $resultat=$query->getResultArray();
        return $resultat;
        
    }

    function newunite($data)
    {
       $db = \Config\Database::connect();
        $builder = $db->table('conditionnement');

        $builder->select(['libelle']);
        $query = $builder->get();
        $result = $query->getResult();

        foreach ($result as $key => $result) {
            if($result->libelle == $data) {
                return "existe déjà";
                break;
            }
            else{
            
                $builder->insert(['libelle'=> esc($data)]);
                return 'insertion réussie';
                break;
            
            }
        }
    }

     function suppr_unite($data)
    {
       $db = \Config\Database::connect();
        $builder = $db->table('conditionnement');

        $builder->delete(['id_unite'=> esc($data)]);
    }

    //Récupérer une categorie grace à son id
    public function get_categ($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('conditionnement');
        $builder->select(['id_unite','libelle'])->where(['id_unite' => esc($id)]);
        $query = $builder->get();
        $result = $query->getRow();
        return $result;
    }
}


