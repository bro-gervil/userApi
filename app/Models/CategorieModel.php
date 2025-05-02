<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorieModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categorie';
    protected $primaryKey       = 'id_catg';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_catg','libelle'];

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
        $query =$db->query($db->escapeString("SELECT libelle FROM categorie,produit WHERE
            categorie.id_catg=produit.id_catG ORDER BY produit.id_prod DESC;"));
        $resultat=$query->getResultArray();
        return $resultat;
        
    }

    function newcatego($data)
    {
       $db = \Config\Database::connect();
        $builder = $db->table('categorie');

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

     function suppr_categorie($data)
    {
       $db = \Config\Database::connect();
        $builder = $db->table('categorie');

        $builder->delete(['id_catg'=> esc($data)]);
    }

    //Récupérer une categorie grace à son id
    public function get_categ($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('categorie');
        $builder->select(['id_catg','libelle'])->where(['id_catg' => esc($id)]);
        $query = $builder->get();
        $result = $query->getRow();
        return $result;
    }
}


