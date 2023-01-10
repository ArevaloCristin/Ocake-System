<?php
namespace App\Models;
use CodeIgniter\Model;
class Cart_m extends Model
{
    protected $table = 'cart';
    // protected $primaryKey = 'id';
    // protected $foreignKey = 'id';

    protected $allowedFields = ['occasion', 'flavor', 'price', 'quantity', 'total_price', 'product_id', 'user_id', 'is_check', 'order_code'];

    //--------------- FETCH CART ---------------//        Edited on December 31,2022
    # get data in cart model #
    public function getCartData($id) {
        return $this->db->table('cart as c')
                        ->select('*')
                        ->join('product as p','p.id=c.product_id')
                        ->where('c.user_id', $id)
                        ->where('order_code', "")
                        ->get()->getResult();
    }

    //--------------- FETCH CART ---------------//          December 31,2022
    public function fetchCart($id, $cart_id) {
        return $this->db->table('cart as c')
                        ->select('*')
                        ->join('product as p','p.id=c.product_id')
                        ->where('c.user_id', $id)
                        ->where('cart_id', $cart_id)
                        ->where('order_code', "")
                        ->get()->getResult();
    }

    //--------------- UPDATE CART ---------------//        December 30,2022
    public function cart_update($code, $id){
        // return "hi";
        $update = $this->set('order_code', $code)
                        ->where('user_id', $id)
                        ->where('order_code', "")
                        ->update();
        if($update)
            return true;
        else
            return false;
    }

    //------------- COUNT CART DATA -------------//        January 05,2023
    public function count_data($id){
        return $this->db->table('cart')
                    ->select('Count(cart_id) as count')
                    ->where('user_id', $id)
                    ->where('order_code', "")
                    ->get()->getResult();
    }

    
    public function cart_delete($id){
        $result = $this->db->table('cart')
                          ->where('cart_id',$id)
                          ->delete();
  
                          if($result){
                              return true;
                          }         
      }


}?>
