<?php

namespace App\Models;

use CodeIgniter\Model;

class FormAddMagasinModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'produit';
    protected $primaryKey       = 'id_prod';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_prod','id_catG','code_barre','desc'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'dateC';
    protected $updatedField  = 'dateMod';
    protected $deletedField  = 'dateSupr';

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
    

    public function createData1Mag($data){
        $db= \Config\Database::connect();
        esc($data);
        $query1=$this->$db->insert('produit',esc($data));
        return $query1;
    }
    //Récupérer tous les produits d'un stock
    public function getData1Prod($id_stock){
        $query=$this->db->query('SELECT produit.id_prod,produit.desc, conditionnement.libelle as unite,
                                        categorie.libelle,
                                        SUM(prod_stock.qtite_prod) as qtite_prod,
                                        prod_stock.dateEntree,
                                        prod_stock.dateExp ,
                                        prod_stock.id_prod_stock,
                                        prod_stock.lot
                                FROM produit,conditionnement,categorie,prod_stock 
                                WHERE produit.id_prod=prod_stock.id_prod AND
                                    prod_stock.id_unite=conditionnement.id_unite AND
                                    categorie.id_catg=produit.id_catG AND
                                    prod_stock.id_stock='.esc($id_stock).' AND
                                    (prod_stock.dateExp IS NULL OR prod_stock.dateExp >= CURDATE())
                                GROUP BY produit.id_prod,prod_stock.id_prod_stock,produit.desc,prod_stock.lot,conditionnement.libelle, categorie.libelle,
                                    prod_stock.qtite_prod,prod_stock.dateEntree,prod_stock.dateExp
                                ORDER BY produit.desc 
                                   ;');
        $result=$query->getResultArray();
        return $result;
        
    }

    public function toSelectProd($desc,$idcat,$idunit){
        $db = \Config\Database::connect();
        $query= $db->table('produit')
        ->select('produit.id_prod')
        ->where(['produit.desc' => $desc, 'produit.id_catG' => $idcat,'conditionnement.id_unite' => $idunit])
        ->join('prod_stock','produit.id_prod = prod_stock.id_prod','INNER')
        ->join('conditionnement','conditionnement.id_unite = prod_stock.id_unite')
        ->get();
                                
        $result=$query->getResultArray();
        $data = array();
        foreach($result as $r){
            $data = [
                "id_prod" => $r['id_prod'],
            ];
        }
        return $data; 
    }
  
    //Récupérer le dernier produit d'un stock 
    public function getFData1Prod($stock){
        $query=$this->db->query('SELECT produit.id_prod,produit.desc,
                                        categorie.libelle,
                                        prod_stock.qtite_prod,
                                        prod_stock.dateEntree,
                                        prod_stock.dateExp 
                                FROM produit,categorie,prod_stock 
                                WHERE produit.id_prod=prod_stock.id_prod AND
                                    categorie.id_catg=produit.id_catG AND
                                    prod_stock.id_stock='.esc($stock).'
                                ORDER BY prod_stock.id_prod_stock DESC LIMIT 1;
                                ');
        $result=$query->getResultArray();
        return $result;
    }

    public function getprod_exp($stock,$datenow){
        $query=$this->db->query('SELECT produit.id_prod,produit.desc,
                                        categorie.libelle,
                                        prod_stock.qtite_prod,
                                        prod_stock.dateEntree,
                                        prod_stock.dateExp 
                                FROM produit,categorie,prod_stock 
                                WHERE produit.id_prod=prod_stock.id_prod AND
                                    categorie.id_catg=produit.id_catG AND
                                    prod_stock.dateExp <= "'.esc($datenow).'" AND
                                    prod_stock.id_stock='.esc($stock).' AND prod_stock.dateExp <> '.'0000-00-00'.'
                                ORDER BY prod_stock.id_prod_stock DESC;
                                ');
        $result=$query->getResultArray();
        
        return $result;
    }


    //Récupérer un produit dans un stock grace à son id
    public function getOneData1Prod($index, $id_prod_stock, $stock)
    {
        $sql = 'SELECT produit.desc,
                                        categorie.libelle,
                                        prod_stock.qtite_prod,
                                        prod_stock.dateExp 
                                FROM produit,categorie,prod_stock 
                                WHERE produit.id_prod=prod_stock.id_prod AND
                                    categorie.id_catg=produit.id_catG AND
                                    prod_stock.id_stock=' . esc($stock) . ' AND
                                    prod_stock.id_prod_stock=' . esc($id_prod_stock) . ' AND
                                    produit.id_prod =' . esc($index) . ';';

        $result = $this->db->query($sql, $index)->getResultArray();

        return $result;
    }


    //Récupérer tous les produits d'une catégorie donnée
    public function getAllProd_id($id_catg)
    {
        $sql = 'SELECT produit.id_catG
                                FROM produit,categorie
                                WHERE categorie.id_catg=produit.id_catG AND
                                produit.id_catG = '.esc($id_catg).';';
        $result = $this->db->query($sql)->getResultArray();

        return $result;
    }

    //Mettre à jour un produit modifié
     public function updateDataMag($tablename,$data,$where){

        $query = $this->db->table(esc($tablename))->where(esc($where))->update(esc($data));
        return $query;
    }

    //Historiser un enrgistrement de produit
    public function historize($operation,$date){
        $db = \Config\Database::connect();
        // Obtenez la date actuelle
        $username = auth()->user()->username;
        $builder = $db->table('historique')->insert(['date_his'=>$date,'operation'=>$operation,'responsable'=>$username]);
    }

    //Récupérer le contenu de la table historique
    public function getStory()
    {
        $db = \Config\Database::connect();
        // Obtenez la date actuelle
        $username = auth()->user()->username;
        $builder = $db->table('historique')->select('*')->orderBy('id_his','DESC')->limit('15')->get()->getResult();
        return $builder;
    }

    public function prodexp()
    {
        $db = \Config\Database::connect();
        // Obtenez la date actuelle
        $dateActuelle = date('Y-m-d');
        
        // Sélectionnez les produits dont la date d'expiration est atteinte
        $produitsExpires = $db->table('prod_stock')
                                ->select('produit.desc')
                                ->where('prod_stock.dateExp <=', $dateActuelle)
                                ->join('produit','produit.id_prod = prod_stock.id_prod','INNER')
                                ->get();

         // Affichez les résultats
        $result = $produitsExpires->getResult();
        return $result;
    }

    public function nbre_prodexp($date, $id)
    {
        $db = \Config\Database::connect();

        // Sélectionnez les produits dont la date d'expiration est atteinte
        $query = $db->query('SELECT COUNT(produit.desc) as total FROM produit, prod_stock WHERE produit.id_prod=prod_stock.id_prod  AND prod_stock.dateExp <= "' . esc($date) . '" AND prod_stock.id_stock =' . esc($id) . ';');
        $result = $query->getResultArray();
        
        foreach ($result as $row) {
            return $row['total'];
        }
    }


    public function nbre_ravitail($idstock)
    {
        $db = \Config\Database::connect();

        // Sélectionnez les produits dont la date d'expiration est atteinte
        $query = $db->query('SELECT COUNT(DISTINCT DATE(dateEntree)) as ravitaillement FROM produit, prod_stock WHERE produit.id_prod=prod_stock.id_prod  AND prod_stock.id_stock = ' . esc($idstock) . ';');
        $result = $query->getResultArray();
        
        foreach ($result as $row) {
            return $row['ravitaillement'];
        }
    }


}
