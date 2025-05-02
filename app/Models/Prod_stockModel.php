<?php

namespace App\Models;

use CodeIgniter\Model;

class Prod_stockModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'prod_stock';
    protected $primaryKey       = 'id_prod_stock';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_prod_stock','id_prod','qtite_prod','id_unite','id_stock','lot','dateExp','dateEntree','stock_ini','compt_phys','ecart'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'dateEntree';
    protected $updatedField  = 'dateEntree';
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

    public function entree_stockMag($data){
        $db= \Config\Database::connect();
        esc($data); 
        $query1=$this->$db->insert('prod_stock',esc($data));
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
            $id_prod = $product['id_prod_stock'];
            $quantity_removed = $product['qtite_livr'];
            $current_quantity =$product['qtite_prod'];
            $idstock = $product['id_stock'];
         
            // Calculer la nouvelle quantité
            $new_quantity = $current_quantity - $quantity_removed;

            // Mettre à jour la quantité du produit dans la base de données
            $data = ['qtite_prod' => $new_quantity];
            $where = ['id_prod_stock' => $id_prod,
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

    public function update_comptage($data2,$data1,$ecart){
        $query = $this->db->table('prod_stock')->where("id_prod",$data2)->update(['compt_phys'=>$data1,'ecart'=>$ecart,]);
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


    public function create_notif_from_expiring_prod()
    {
        $db = \Config\Database::connect();
        $data_alerte = null;
        $id_stock = null; 

        $prodstockModel = new \App\Models\Prod_stockModel();
        $magasinModel = new \App\Models\MagasinModel();
        $notificationModel = new \App\Models\NotificationModel();
        $alerteModel = new \App\Models\AlerteModel();
        $vuModel = new \App\Models\VuModel();
        
        // Sélectionnez tous les produits qui vont expirer dans 3 mois
        $products = $this->where('dateExp BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 3 MONTH)')
                            ->join('produit','produit.id_prod = prod_stock.id_prod','INNER')
                            ->findAll();

        foreach ($products as $product) {

            // Créez une nouvelle notification pour chaque produit
            $notificationData = [
                'contenu' => 'Le stock de ' . $product['desc'] . ' va expirer dans les 3 prochains mois',
                'type' => 'Alerte',
            ];

            //selectionne le stock auquel appartient le produit
            $id_stock = $prodstockModel->select_idstock($product['id_prod']);

            //selectionne le magasin auquel appartient le stock
            $id_magasin = $magasinModel->magasin_by_stock(esc($id_stock));

           $alerte = $alerteModel->alerte_by_produit(esc($product['id_prod']));

            if ((isset($alerte)) && count($alerte)==0) {

                $notificationModel->insert(esc($notificationData));

                // Obtenez l'ID de la nouvelle notification
                $notificationId = $db->insertID();

                $data_alerte = [
                    'id_prod' => $product['id_prod'],
                    'dateExp' => $product['dateExp'],
                    'id_mag' => $id_magasin,
                    'id_notif' => $notificationId,
                ];

                //creation de l'alerte
                $alerteModel->save_alerte(esc($data_alerte));

                // Associez la notification à tous les utilisateurs
                $userModel = new \App\Models\UserModel();
                $users = $userModel->select_allUSers();


                foreach ($users as $user) {
                    $userNotificationData = [
                            'id_user' => $user['id'],
                            'id_notif' => $notificationId,
                            'vu' => 0
                        ];
                    $vuModel->insert(esc($userNotificationData));
                }
            }
        }
    }

}
