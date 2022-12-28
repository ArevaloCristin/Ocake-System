<?php
namespace App\Models;
use CodeIgniter\Model;
class Cart_m extends Model
{
    protected $table = 'cart';
    // protected $primaryKey = 'id';
    // protected $foreignKey = 'id';

    protected $allowedFields = ['occasion', 'flavor', 'price', 'quantity','product_id'];



    # get data in cart model #
    public function getCartData() {
        return $this->db->table('cart as c')
                        ->select('*')
                        ->join('product as p','p.id=c.product_id')
        
        // ->where('occasion', $occasion)
                        ->get()->getResult();
    }
    function count_data(){
        return $this->db->table('cart')
                    ->selectCount('cart_id')
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