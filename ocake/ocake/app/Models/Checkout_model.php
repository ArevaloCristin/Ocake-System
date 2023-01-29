<?php 
namespace App\Models;

use CodeIgniter\Model;

class Checkout_model extends Model
{
    protected $table = 'checkout';
    // $primaryKey ='checkout_id';
    protected $allowedFields = [ 'user_id', 'biller_id', 'total_price', 'items', 'order_code', 'stat', 'created_at'];

    //-------------------- INSERT CHECKOUT DATA ----------------------//        January 02, 2023
    public function save_checkout($data){
        //this will save data in biller_details table       
        $insert = $this->insert($data);
    }
    //--------------- FETCH CHECKOUT DETAILS FOR ADMIN ---------------//        January 03, 2023
    # get data in checkout model #
    public function getCheckoutData() {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->get()->getResult();
    }

    //--------------- FETCH CHECKOUT DETAILS FOR ADMIN ---------------//        January 03, 2023
    # for view order details #
    public function getDetails() {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('users as u','u.id=co.user_id')
                        ->join('cart as c','c.order_code=co.order_code')
                        ->join('product as p','c.product_id=p.id')
                        ->get()->getResult();
    }


    //-------- FETCH ORDER DETAILS DATA FOR USER ORDERDETAILS --------//        January 03, 2023
    # get data in checkout, biller, & cart model #
    public function fetchCheckoutData($id, $order_code) {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->join('cart as c','c.order_code=co.order_code')
                        ->join('product as p','c.product_id=p.id')
                        ->where('co.order_code', $order_code)
                        ->where('co.user_id', $id)
                        ->get()->getResult();
    }

    //--------- FETCH CHECKOUT DETAILS FOR USER ORDERDETAILS ---------//        January 03, 2023
    # get data in checkout & biller model #
    public function getCheckout($id, $order_code) {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.order_code', $order_code)
                        ->where('co.user_id', $id)
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }

     //---------- FETCH CHECKOUT DETAILS FOR USER ORDERDETAILS --------//        January 03, 2023
    # get data in checkout model #
    public function get($id, $order_code) {
        return $this->db->table('checkout')
                        ->select('*')
                        ->where('order_code', $order_code)
                        ->where('user_id', $id)
                        ->get()->getResult();
    }
    //------------ FETCH CHECKOUT DETAILS FOR USER ORDERS -----------//          January 03, 2023
    # get data in checkout & biller model #
    public function getData($id) {
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.user_id', $id)
                        ->where ('stat !=', "Completed")
                        ->where('stat !=', "Cancelled")
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }
    public function getCompleted($id){
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.user_id', $id)
                        ->where('stat',"Completed")
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }
    public function getCancelled($id){
        return $this->db->table('checkout as co')
                        ->select('*')
                        ->join('biller_details as b','b.biller_id=co.biller_id')
                        ->join('users as u','u.id=co.user_id')
                        ->where('co.user_id', $id)
                        ->where('stat',"Cancelled")
                        ->groupBy('co.created_at')
                        ->get()->getResult();
    }
   

    //--------------------- UPDATE CHECKOUT DATA ----------------------//       January 03, 2023
    public function checkout_update($data,$id){
        $this->set($data)->where('checkout_id', $id)->update();
    }

    //---------------------- DELETE CHECKOUT DATA ---------------------//       January 03, 2023
    public function checkout_delete($id){
        $result = $this->db->table('checkout')
            ->where('checkout_id', $id)
            ->delete();

        if ($result) {
            return true;
        }
    }

    //---------------------- COUNT PENDING ORDERS ---------------------//       January 14,2023
	public function count_pending(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Pending")
					->get()->getResult();
	}

    //---------------------- COUNT CONFIRMED ORDERS ---------------------//       January 14,2023
	public function count_confirmed(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Confirmed")
					->get()->getResult();
	}

    //---------------------- COUNT SHIPPED ORDERS ---------------------//       January 14,2023
	public function count_shipped(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Shipped")
					->get()->getResult();
	}

    //---------------------- COUNT PENDING ORDERS ---------------------//       January 14,2023
	public function count_delivered(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Delivered")
					->get()->getResult();
	}

    //--------------------- COUNT CANCELLED ORDERS --------------------//       January 14,2023
	public function count_cancelled(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Cancelled")
					->get()->getResult();
	}

    //--------------------- COUNT COMPLETED ORDERS --------------------//      January 14,2023
	public function count_completed(){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('stat',"Completed")
					->get()->getResult();
	}

    //------------------------- COUNT EARNINGS ------------------------//      January 14,2023
	public function count_earnings(){
		return $this->db->table('checkout')
					->select('Sum(total_price) as sum')
                    ->where('stat',"Completed")
					->get()->getResult();
	}

    //------------------------- COUNT EARNINGS ------------------------//      January 21,2023
	public function count_orders($id){
		return $this->db->table('checkout')
					->select('Count(checkout_id) as count')
                    ->where('user_id', $id)
                    ->where ('stat !=', "Completed")
                    ->where('stat !=', "Cancelled")
					->get()->getResult();
	}
}
?>
