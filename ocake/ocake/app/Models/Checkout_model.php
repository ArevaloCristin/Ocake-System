<?php 
namespace App\Models;

use CodeIgniter\Model;

class Checkout_model extends Model
{
    protected $table = 'checkout';
    // protected $primaryKey ='checkout_id';
    protected $allowedFields = [ 'user_id', 'biller_id', 'total_price', 'order_code'];

    public function save_checkout($data){
        // THIS WILL SAVE DATA IN BILLER DETAILS TABLE                              January 02, 2023
        $insert = $this->insert($data);
       
    }

    // public function getCartData($id) {
    //     return $this->db->table('tbl_cart as c')
    //                     ->select('*')
    //                     ->where('c.user_id', $id)
    //                     ->join('product as p','p.id=c.product_id')
        
    //     // ->where('occasion', $occasion)
    //                     ->get()->getResult();
    // }
    // function count_data(){
    //     return $this->db->table('product_order')
    //                 ->selectCount('order_id')
    //                 ->get()->getResult();
    // }
    // public function cart_delete($id){
    //   $result = $this->db->table('product_order')
    //                     ->where('order_id',$id)
    //                     ->delete();

    //                     if($result){
    //                         return true;
    //                     }
                    
    //   }

}
?>
