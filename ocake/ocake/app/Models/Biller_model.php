<?php
namespace App\Models;
use CodeIgniter\Model;
class Biller_model extends Model{
    protected $table = 'biller_details';
    //protected $primaryKey = 'biller_id';
    protected $allowedFields = ['user_id', 'firstname', 'lastname', 'email', 'mobile','municipality', 'barangay', 'street', 'delivery_method', 'date', 'payment_method'];

    //---------- UPDATE BILLER'S DATA ----------//  December 27,2022
    public function biller_update($data,$id){
        $this->set($data)->where('biller_id', $id)->update();
    }

    //---------- INSERT BILLER'S DATA ----------//  January 02, 2023
    public function save_biller($data){
        //this will save data in biller_details table                              
        $insert = $this->insert($data);
       
        //this will get last id then insert in checkout table as biller's id 
        if ($insert){
            return $this->insertID();
        }
        else{
            return false;
        }
    }

    
}
