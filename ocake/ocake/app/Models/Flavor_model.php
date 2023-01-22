<?php
namespace App\Models;
use CodeIgniter\Model;
class Flavor_model extends Model{
    protected $table = 'flavor';
    protected $primaryKey = 'flavor_id';
    protected $allowedFields = ['flavor', 'flavor_status'];

    //-------------- FETCH FLAVOR ------------//          December 28,2022
    public function fetchFlavor() {
        $session= session();
        if($session->type == "admin"){
        return $this->select('*')
                    ->get()->getResult();
        }elseif($session->type == "user"){
            return $this->select('*')
                        ->where('flavor_status',"Available")
                        ->get()->getResult();
        }
    }

    //------------- DELETE FLAVOR ------------//          December 28,2022
    public function flavor_delete($id){
        $result = $this->db->table('flavor')
            ->where('flavor_id', $id)
            ->delete();

        if ($result) {
            return true;
        }
    }

    //------------- UPDATE FLAVOR -------------//          December 28,2022
    public function flavor_update($data,$id){
        $result = $this->db->table('flavor')
            ->where('flavor_id', $id)
            ->set ($data)
            ->update();

        if ($result) {
            return true;
        }
    }
}
