<?php

namespace App\Models;

use CodeIgniter\Model;

class SortieStockModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sortie_stock';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id','id_prod_stock','id_prod','qtite_sortie','date','created_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'date';
    protected $updatedField  = 'date';
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

    public function sortieStock($data){
        $db= \Config\Database::connect();
        esc($data); 
        $query1=$this->$db->insert('sortie_stock',esc($data));
        return $query1;
    }

    //Baisser la quantité d'un produit 
    public function qtiteGet($tablename,$data,$where){

        $query = $this->db->table($tablename)->where(esc($where))->update(esc($data));
        return $query;
    }

    //Baisser la quantité d'un produit 
    public function updateQtiteMoins($tablename, $products)
    {
        foreach (esc($products) as $product) {
            $id_prod = $product['id_prod'];
            $quantity_removed = $product['qtite_livr'];
            $current_quantity =$product['qtite_prod'];
            $idstock = $product['id_stock'];
         
            // Calculer la nouvelle quantité
            $new_quantity = $current_quantity - $quantity_removed;

            // Mettre à jour la quantité du produit dans la base de données
            $data = ['qtite_prod' => $new_quantity];
            $where = ['id_prod' => $id_prod,
                        'id_stock' => $idstock];
            $this->qtiteGet($tablename, esc($data), esc($where));
        }
    }


    public function getDatastock(){
        $db= \Config\Database::connect();
        
        $query=$db->query(esc('SELECT qtite_prod FROM prod_stock,produit,stock WHERE 
        prod_stock.id_prod=produit.id_prod AND prod_stock.id_stock=11 ORDER BY prod_stock.id_prod_stock DESC'));
        $result=$query->getResultArray();
        return $result;
        
    }

    public function updateStockMag($tablename, $data, $where)
    {
        $query = $this->db->table($tablename)->where(esc($where))->update(esc($data));
        return $query;
    }

    public function select_datastock($idstock)
    {
        $db = \Config\Database::connect();
        $nbre = $db->table('prod_stock')->select('id_prod')->where('id_stock',esc($idstock))->countAllResults();
        return $nbre;
    }

    //Sélectionner la liste des magasins 
    public function select_idstock($id_prod){
        $db = \Config\Database::connect();
        $builder = $db->table('prod_stock');
        $row = $builder->select('id_stock')->where(['id_prod'=>esc($id_prod)])->get()->getResultArray();  

        foreach($row as $r){
            return $r['id_stock'];
        }
    }

    public function suppr_prod_stock_magasin($data)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('prod_stock');
        if($builder->select('*')->where(['id_stock' => esc($data)])){
            $builder->delete(['id_stock' => esc($data)]);
            return true;
        }
        else{
            return false;
        }
    }

}
