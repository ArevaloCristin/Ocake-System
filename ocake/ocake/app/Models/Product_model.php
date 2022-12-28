<?php

namespace App\Models;
use CodeIgniter\Model;
class Product_model extends Model{
    protected $table = 'product';
   // protected $primaryKey = 'id';
    protected $allowedFields = ['occasion', 'status', 'flavor', 'price', 'image'];
    
    // public function getBDay($id = false) {
    //   if($id === false) {
    //     return $this->findAll();
    //   } else {
    //       return $this->getWhere(['id' => $id, 'occassion' => 'Birthday' ]);
    //   }
    // }


    # ------ FETCH ALL PRODUCT ----#
    public function fetchProduct() {
      return $this->select('*')
                  ->get()->getResult();
  }
        //---------- CATEGORY RETRIEVE ----------//  November 28,2022
    public function getBDay($occasion) {
        return $this->select('*')->where('occasion', $occasion)
                    ->get()->getResult();
    }

    public function getChristening($occasion) {
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }

    public function getWedding($occasion) {
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }

    public function getGrad($occasion) {
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }

    public function getValentine($occasion) {
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }

    public function getHalloween($occasion) {
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }

    public function getChristmas($occasion) {
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }

    public function getNewYear($occasion) {
      return $this->select('*')->where('occasion', $occasion)
                  ->get()->getResult();
    }

    //---------- DELETE PRODUCT ----------//  November 28,2022

    public function prod_delete($id){
      return $this->delete(['id' => $id]);
    }
    
    //---------- UPDATE PRODUCT ----------//  November 29,2022
  
    public function prod_update($data, $id){
      $this->set($data)->where('id', $id)->update();
    }

    
}