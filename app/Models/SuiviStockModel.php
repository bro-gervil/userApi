<?php

namespace App\Models;

use CodeIgniter\Model;

class SuiviStockModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'suivi';
    protected $primaryKey       = 'id_suivi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_suivi','id_prod','entr_stock','sort_stock','stock_ini','stock_phys_dispo','date','created_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'date';
    protected $updatedField  = 'created_at';
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

    // Function to get suivi details
    public function getAllSuivi()
    {
        return $this->db->table('produit')
            ->select('produit.id_prod as Id, produit.desc as Produit, categorie.libelle as Categorie,
                    conditionnement.libelle Unite, suivi.stock_phys_dispo as `Stock_Disponible` ,
                    suivi.stock_ini as `Stock_Initial`, suivi.entr_stock as `Entree_Stock`, 
                    suivi.sort_stock as `Sortie_Stock` ')
            ->join('prod_stock', 'produit.id_prod = prod_stock.id_prod')
            ->join('conditionnement', 'conditionnement.id_unite = prod_stock.id_unite')
            ->join('suivi','suivi.id_prod = produit.id_prod')
            ->join('categorie', 'produit.id_catG=categorie.id_catg')
            ->orderBy('categorie.libelle')->distinct()
            ->get()->getResultObject();

        //Vraie requete
        
    }


    //Baisser la quantité d'un produit 
    public function qtiteGet($tablename,$data,$where){

        $query = $this->db->table($tablename)->where(esc($where))->update(esc($data));
        return $query;
    }

    //Baisser la quantité d'un produit 
    public function updateSuivi($tablename, $products)
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


    public function getStat($id_prod,$id_unite,$idcat){
        $db= \Config\Database::connect();

        $query=$db->query('SELECT pr.id_prod as id, ca.id_catg, c.id_unite, SUM(p.qtite_prod) as q, s.stock_ini as s_ini, s.entr_stock as ent_s ,s.stock_phys_dispo as s_phys, s.sort_stock as sort_s 
        FROM produit pr
        JOIN suivi s ON s.id_prod = pr.id_prod
        JOIN categorie ca ON ca.id_catg = pr.id_catG
        JOIN prod_stock p ON p.id_prod = pr.id_prod
        JOIN conditionnement c ON c.id_unite = p.id_unite
        GROUP BY id, ca.id_catg, c.id_unite, s.id_prod, s_ini, ent_s, sort_s,s_phys
        HAVING ca.id_catg = '.$idcat.' AND
        c.id_unite = '.$id_unite.' AND
        pr.id_prod ='.$id_prod);

        $result=$query->getResultArray();
        $data = array();
        foreach($result as $r){
            $data = [
                "qtite_prod" => $r['q'],
                "stock_ini" => $r['s_ini'],
                "compt_phys" => $r['s_phys'],
                "sort_stock" => $r['sort_s'],
                "entr_stock" => $r['ent_s'],
            ];
        }
        return $data; 
    }

    public function toselectSuivi($idp){
        $db= \Config\Database::connect();
        
        $query=$db->query('SELECT id_suivi,stock_phys_dispo,sort_stock FROM suivi WHERE id_prod ='.$idp);
        $result=$query->getResultArray();
        $data = array();
        foreach($result as $r){
            $data = [
                "id_suivi" => $r['id_suivi'],
                "sort_stock" => $r['sort_stock'],
                "stock_phys_dispo" => $r['stock_phys_dispo'],
            ];
        }
        return $data; 
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
