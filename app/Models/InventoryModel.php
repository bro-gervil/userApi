<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table            = 'prod_stock';
    protected $primaryKey = 'id_prod_stock';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['id_prod', 'qtite_prod', 'unite_prod', 'id_stock'];

    protected bool $allowEmptyInserts = false;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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

    // Function to get inventory details
    public function getInventory()
    {
        return $this->db->table('produit')
            ->select('produit.id_prod as Id, produit.desc as Produit, categorie.libelle as Categorie, conditionnement.libelle Unite, suivi.stock_phys_dispo as `Stock_Disponible` ,comptage.stock_theor as `Stock_Theorique`, comptage.compt as `Comptage_Physique`, comptage.ecart as Ecart ')
            ->join('prod_stock', 'produit.id_prod = prod_stock.id_prod')
            ->join('conditionnement', 'conditionnement.id_unite = prod_stock.id_unite')
            ->join('comptage','comptage.id_prod = produit.id_prod')
            ->join('suivi','suivi.id_prod = produit.id_prod')
            ->join('categorie', 'produit.id_catG=categorie.id_catg')
            ->orderBy('categorie.libelle')->distinct()
            ->get()->getResultObject();

        //Vraie requete
        
    }

    public function getInvent()
    {
        return $this->db->table('prod_stock')
            ->select('categorie.libelle,produit.id_catG,produit.id_prod,produit.desc, prod_stock.dateExp, prod_stock.unite_prod,prod_stock.qtite_prod, stock.proprietaire')
            ->join('produit', 'produit.id_prod = prod_stock.id_prod')
            ->join('categorie', 'produit.id_catG=categorie.id_catg')
            ->join('stock', 'stock.id_stock = prod_stock.id_stock')->groupBy('produit.id_catG,produit.id_prod,produit.desc, prod_stock.dateExp, prod_stock.unite_prod,prod_stock.qtite_prod, stock.proprietaire')
            ->orderBy('categorie.libelle')
            ->get()->getResultObject();
    }

    public function inventaire_prod()
    {
        // Sélectionnez tous les produits qui vont expirer dans 3 mois
        $products = $this->where('')
            ->join('produit', 'produit.id_prod = prod_stock.id_prod', 'INNER')
            ->findAll();
    }
}
