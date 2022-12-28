<?php 
namespace App\Models;

use CodeIgniter\Model;

class Checkout_model extends Model
{
    protected $table = 'product_order';
    // protected $primaryKey ='pid';
    protected $allowedFields = ['occasion', 'flavor', 'price', 'quantity','stat', 'product_id'];

    public function getCartData() {
        return $this->db->table('tbl_cart as c')
                        ->select('*')
                        ->join('product as p','p.id=c.product_id')
        
        // ->where('occasion', $occasion)
                        ->get()->getResult();
    }
    function count_data(){
        return $this->db->table('product_order')
                    ->selectCount('order_id')
                    ->get()->getResult();
    }
    public function cart_delete($id){
      $result = $this->db->table('product_order')
                        ->where('order_id',$id)
                        ->delete();

                        if($result){
                            return true;
                        }
                    
      }

}
?>