<?php

namespace App\Controllers;
use App\Models\Checkout_model;
use App\Models\Cart_m;
use App\Models\Biller_model;
class CheckoutController extends BaseController
{
    public function __construct()
    {
        $session = \Config\Services::session();
    }

    //--------------- PLACE ORDER ---------------//           January 02, 2023
    public function placeorder(){ 
        if(isset($_SESSION['logged_in']) == true && isset($_SESSION['type']) == "user"){     
            $id = $_SESSION['user_id'];                 
            helper(['form', 'url']);
        
            $val = $this->validate([ ]);
            
            #generate random code
            $today = date("Ymd");
            $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
            $random = $today .$rand;

           #update cart data    
           $cart_model = new Cart_m();       
            $update_cart = $cart_model->cart_update($random,$id);

            if($update_cart == true){
                #insert biller data 
                $biller_model = new Biller_model();
                $data = array(       
                        'firstname'       => $this->request->getVar('firstname'),
                        'lastname'        => $this->request->getVar('lastname'),
                        'email'           => $this->request->getVar('email'),
                        'mobile'          => $this->request->getVar('mobile'),
                        'municipality'    => $this->request->getVar('municipality'),
                        'barangay'        => $this->request->getVar('barangay'),
                        'street'          => $this->request->getVar('street'),
                        'delivery_method' => $this->request->getVar('delivery_method'),
                        'date'            => $this->request->getVar('date'),
                        'payment_method'  => $this->request->getVar('payment_method'),
                        'user_id'         => $id,       
                    ); 
                    $insert_biller = $biller_model->save_biller($data);
                    
                     #insert checkout data 
                    $checkout_model = new Checkout_model();
                    $datum = array(
                            'user_id'         => $id, 
                            'biller_id'       => $insert_biller,
                            'total_price'     => $this->request->getVar('total_price'),
                            'items'           => $this->request->getVar('count'),
                            'order_code'      => $random,
                    );
                    $insert_checkout= $checkout_model->save_checkout($datum);
                    return redirect('cart');  
            }
 
        } else{
            return $this->response->redirect(site_url('signin'));
        }    
    }
}
?>
