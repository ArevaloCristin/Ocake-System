<?php
namespace App\Models;
use CodeIgniter\Model;
class AddOns_model extends Model
{
    protected $table = 'add_ons';
    //protected $primaryKey = 'add_ons_id';
    // protected $foreignKey = 'id';

    protected $allowedFields = ['image', 'quantity', 'description', 'price', 'addons_status'];

    //---------- FETCH ADDONS ----------//  December 18,2022
    public function fetchAddOns() {
        $session= session();
        if($session->type == "admin"){
            return $this->select('*')
                        ->get()->getResult();
        }elseif($session->type == "user"){
            return $this->select('*')
                        ->where('addons_status',"Available")
                        ->get()->getResult();
        }
    }

    //---------- DELETE ADDONS ----------//  December 18,2022
    public function addons_delete($id){
        $result = $this->db->table('add_ons')
            ->where('add_ons_id', $id)
            ->delete();

        if ($result) {
            return true;
        }
    }
      
    //---------- UPDATE ADDONS ----------//  December 18,2022
    public function addons_update($data,$id){
        $result = $this->db->table('add_ons')
            ->where('add_ons_id', $id)
            ->set ($data)
            ->update();

        if ($result) {
            return true;
        }
    }

    //--------- COUNT ADDONS ----------//   January 14,2023
	public function count_addons(){
		return $this->db->table('add_ons')
					->select('Count(add_ons_id) as count')
                    ->get()->getResult();
	}

}?>
